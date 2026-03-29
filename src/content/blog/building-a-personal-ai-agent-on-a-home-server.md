---
title: "Building a Personal AI Agent on a Home Server"
date: 2026-03-29
tags: ["ai", "devops", "architecture", "home-lab"]
excerpt: "How I set up a personal AI assistant running Claude on my home server, accessible from anywhere via Tailscale and Discord — and what I learned along the way."
draft: true
---

Most AI assistants live in the cloud, which means your data travels through someone else's servers, your context resets after every session, and your agent can't touch anything on your actual machine. I wanted something different: an assistant that knows my environment, persists memory across conversations, and can actually act on my infrastructure.

So I built one.

---

## The Stack

The core is straightforward:

- **Claude** (via Anthropic API) as the reasoning engine
- **NanoClaw** as the agent runtime (Claude Agent SDK wrapper)
- **Discord** as the interface -- always open on my phone, no new app needed
- **Tailscale** for secure remote access from London to my server in India
- **Docker** for containerization
- **Ollama + Qwen** for cheap local pre-processing tasks

The server is a modest home machine with an RTX 4060. Nothing exotic.

---

## Why Discord?

The interface choice matters more than you'd think. I tried building a custom web UI, then a Telegram bot, then just SSH-ing in. Discord won because:

1. It's already open all day
2. Rich embeds make structured output readable
3. Reactions are a natural progress indicator (I use an hourglass while the agent is working)
4. Thread support lets me keep different topics separate

The bot has `MANAGE_MESSAGES` permissions so it can clean up, pin important outputs, and bulk-delete test noise.

---

## Skills System

The most useful design decision was extracting behaviors into **skills** -- discrete markdown files with instructions for specific tasks. Want a daily news digest? There's a skill. Calendar sync? Skill. Email triage? Skill.

Each skill lives at `~/.claude/skills/<name>/SKILL.md` and is loaded into the agent's context. The agent knows to check for a skill before improvising. This means:

- Consistent behavior across sessions
- Easy to audit and update
- No prompt engineering sprawl

I wrote about 25 skills so far. The most-used ones are `morning-briefing`, `deadline-tracker`, `gmail-triage`, and `server-monitor`.

---

## Memory Persistence

One of the biggest frustrations with hosted AI is the blank-slate problem. Every conversation starts from zero. I solved this with a local knowledge graph (Neo4j under the hood) exposed as MCP tools: `remember`, `recall`, `forget`, `explore`.

The agent proactively ingests facts from conversations and recalls them when relevant. It knows my timezone, my university deadlines, that I commute to UCL on certain days, which tech stack I use. This turns a stateless model into something that actually knows me.

---

## The Tailscale Layer

My server is physically in India. I'm in London. Tailscale creates a mesh VPN between them, so the agent can reach internal services (Ollama, local DBs, Docker APIs) as if they were localhost. Zero port forwarding, zero public exposure. Latency is about 150ms, which is fine for an AI agent.

---

## What Surprised Me

**The interface is more important than the model.** A good Discord embed beats a brilliant raw JSON response every time. I spent more time on output formatting than on prompting.

**Local LLMs are great for pre-processing.** I use Qwen3.5 to classify emails, summarize long documents, and filter noise before handing structured data to Claude. This cuts API costs significantly.

**Skills need auditing.** Early on, skills would silently drift from their intended behavior. I added an auto-audit system that validates every skill edit against a checklist and reverts bad changes. It's been the most underrated piece of infrastructure.

---

## What's Next

I want to add voice input, tighter calendar integration with meeting prep, and a proper CI pipeline for skill changes. The agent is already useful daily -- this is mostly polish.

If you're thinking about building your own: the hardest part isn't the code, it's designing the interface between the agent and your life. Start with one or two skills that solve a real daily friction point. Build from there.
