import { z } from "astro/zod";

const ProfileSchema = z.object({
  network: z.string(),
  username: z.string(),
  url: z.string().url(),
});

const BasicsSchema = z.object({
  name: z.string(),
  label: z.string(),
  image: z.string().optional(),
  email: z.string().email(),
  phone: z.string(),
  url: z.string().url(),
  summary: z.string(),
  location: z.object({
    address: z.string().optional(),
    postalCode: z.string().optional(),
    city: z.string(),
    countryCode: z.string(),
    region: z.string().optional(),
  }),
  profiles: z.array(ProfileSchema),
});

const WorkSchema = z.object({
  name: z.string(),
  position: z.string(),
  startDate: z.string(),
  endDate: z.string().optional().default(""),
  summary: z.string().optional().default(""),
  highlights: z.array(z.string()).default([]),
});

const VolunteerSchema = z.object({
  organization: z.string(),
  position: z.string(),
  startDate: z.string(),
  endDate: z.string().optional().default(""),
  summary: z.string().optional().default(""),
  highlights: z.array(z.string()).default([]),
});

const EducationSchema = z.object({
  institution: z.string(),
  area: z.string(),
  studyType: z.string(),
  endDate: z.string().optional().default(""),
  score: z.string().optional(),
  courses: z.array(z.string()).default([]),
});

const CertificateSchema = z.object({
  name: z.string(),
  issuer: z.string(),
});

const SkillSchema = z.object({
  name: z.string(),
  keywords: z.array(z.string()),
});

const LanguageSchema = z.object({
  language: z.string(),
  fluency: z.string(),
});

const InterestSchema = z.object({
  name: z.string(),
});

const ProjectSchema = z.object({
  name: z.string(),
  description: z.string(),
});

const ReferenceSchema = z.object({
  name: z.string(),
});

export const ResumeSchema = z.object({
  basics: BasicsSchema,
  work: z.array(WorkSchema).default([]),
  volunteer: z.array(VolunteerSchema).default([]),
  education: z.array(EducationSchema).default([]),
  certificates: z.array(CertificateSchema).default([]),
  skills: z.array(SkillSchema).default([]),
  languages: z.array(LanguageSchema).default([]),
  interests: z.array(InterestSchema).default([]),
  references: z.array(ReferenceSchema).default([]),
  projects: z.array(ProjectSchema).default([]),
});

export type Resume = z.infer<typeof ResumeSchema>;

const GIST_ID = "3522bc50e00bc9f10976002a56f9abc2";
const LLMC_API = "https://api.llmconveyors.com/api/v1";
const LLMC_API_KEY = import.meta.env.LLMC_API_KEY ?? "";
const CV_THEME = "academic";

async function fetchResume(): Promise<Resume> {
  const response = await fetch(`https://api.github.com/gists/${GIST_ID}`, {
    headers: {
      Accept: "application/vnd.github.v3+json",
      "User-Agent": "ebenezer-isaac-portfolio",
    },
  });

  if (!response.ok) {
    throw new Error(`Failed to fetch gist: ${response.status} ${response.statusText}`);
  }

  const gist = await response.json();
  const raw = JSON.parse(gist.files["resume.json"].content);
  return ResumeSchema.parse(raw);
}

/** Render resume to PDF via llmconveyors API and return base64 */
async function renderCvPdf(resumeData: Resume): Promise<string | null> {
  if (!LLMC_API_KEY) {
    console.warn("[resume] LLMC_API_KEY not set — skipping PDF render");
    return null;
  }

  const response = await fetch(`${LLMC_API}/resume/render`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "x-api-key": LLMC_API_KEY,
    },
    body: JSON.stringify({ resume: resumeData, theme: CV_THEME, format: "pdf" }),
  });

  if (!response.ok) {
    console.error(`[resume] PDF render failed: ${response.status}`);
    return null;
  }

  const result = await response.json();
  if (!result.success) {
    console.error(`[resume] PDF render error: ${result.error?.message}`);
    return null;
  }

  return result.data.pdf;
}

/** Sync master resume to llmconveyors */
async function syncMasterResume(resumeData: Resume): Promise<void> {
  if (!LLMC_API_KEY) return;

  try {
    await fetch(`${LLMC_API}/resume/master`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "x-api-key": LLMC_API_KEY,
      },
      body: JSON.stringify({ resume: resumeData, label: "Portfolio Master" }),
    });
    console.log("[resume] Master resume synced to llmconveyors");
  } catch (e) {
    console.warn("[resume] Failed to sync master resume:", e);
  }
}

const resume = await fetchResume();

// At build time: render PDF and sync to llmconveyors
const cvPdfBase64 = await renderCvPdf(resume);
if (cvPdfBase64) {
  const { writeFileSync } = await import("node:fs");
  const { resolve } = await import("node:path");
  const pdfBuffer = Buffer.from(cvPdfBase64, "base64");
  writeFileSync(resolve("public/ebenezer_cv.pdf"), pdfBuffer);
  console.log(`[resume] CV PDF rendered (${(pdfBuffer.length / 1024).toFixed(0)} KB)`);
}

await syncMasterResume(resume);

export default resume;
export { CV_THEME };
