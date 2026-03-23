---
title: "Hello World — Welcome to My Blog"
date: 2026-03-23
tags: [meta, hello]
excerpt: "First post on my new site. Built with Astro, powered by a GitHub Gist, and deployed via Docker."
draft: false
---

Welcome to my blog. I built this site to share what I'm learning and building — from AEM and enterprise web development to IoT prototypes and AI agent security.

## Why a blog?

LinkedIn is great for networking, but it's not the place for technical depth. I wanted somewhere I could write proper posts about architecture decisions, implementation details, and lessons learned — without a character limit or algorithmic feed.

## How this site works

This portfolio pulls all its data from a [GitHub Gist](https://gist.github.com/ebenezer-isaac/3522bc50e00bc9f10976002a56f9abc2) in JSON Resume format. When I update the gist, the site rebuilds automatically. No manual HTML editing, no CMS — just a JSON file.

The blog posts are markdown files that get type-checked at build time via Astro's content collections. The whole thing builds to static HTML and runs in an nginx container behind a Cloudflare tunnel.

## What to expect

I'll be writing about:

- **Software architecture** — patterns, decisions, and trade-offs from real projects
- **IoT & embedded systems** — what I'm building at UCL and beyond
- **Developer tooling** — automation, CLI tools, and workflow improvements
- **AI agent security** — how to build deterministic trust boundaries for AI systems

Stay tuned.
