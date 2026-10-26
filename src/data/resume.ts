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

async function fetchGistResume(): Promise<unknown> {
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
  return JSON.parse(gist.files["resume.json"].content);
}

/** Render the gist to PDF with jsonresume-theme-academic; returns null so the committed PDF stays if Chrome is unavailable */
async function renderCvPdf(rawResume: unknown): Promise<Buffer | null> {
  try {
    const { render, pdfRenderOptions } = await import("jsonresume-theme-academic");
    const { default: puppeteer } = await import("puppeteer");
    // --no-sandbox: Ubuntu 24.04 runners block Chrome's user-namespace sandbox; the page is our own CV
    const browser = await puppeteer.launch({ args: ["--no-sandbox"] });
    try {
      const page = await browser.newPage();
      await page.setContent(render(rawResume), { waitUntil: "load", timeout: 90_000 });
      await page.evaluate(() => document.fonts.ready);
      return Buffer.from(await page.pdf({ ...pdfRenderOptions, printBackground: true }));
    } finally {
      await browser.close();
    }
  } catch (e) {
    console.warn("[resume] PDF render failed, keeping the committed PDF:", e);
    return null;
  }
}

// The raw gist goes to the theme: the schema below drops fields it does not know, such as meta.headings
const rawResume = await fetchGistResume();
const resume = ResumeSchema.parse(rawResume);

const pdfBuffer = await renderCvPdf(rawResume);
if (pdfBuffer) {
  const { writeFileSync } = await import("node:fs");
  const { resolve } = await import("node:path");
  writeFileSync(resolve("public/ebenezer_cv.pdf"), pdfBuffer);
  console.log(`[resume] CV PDF rendered (${(pdfBuffer.length / 1024).toFixed(0)} KB)`);
}

export default resume;
