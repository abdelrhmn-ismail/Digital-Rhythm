# Development Rules & Assistant Checklist

These rules are non-negotiable for all contributors and must be reviewed before starting any task. Codex (AI assistant) must re-open this document at the start of every session and whenever clarification is needed.

## 1. Clean Code Discipline
- Follow Laravel best practices (controllers lean, services/repositories where appropriate).
- Controllers must only handle HTTP concerns (validation, authorization, response shaping); move business logic to Services + Repositories.
- Implement the repository + service pattern for every feature (`App/Services`, `App/Repositories`); never call the database directly from controllers.
- No inline SQL, dump/debug output, or commented-out code in committed files.
- Keep functions/classes short and purposeful; extract helpers instead of nesting logic.
- Enforce PSR-12 and run `./vendor/bin/pint` plus `phpstan` (or applicable linters) before delivery.

## 2. Blade Must Use Components
- Every UI chunk belongs in `resources/views/components` (or `components/*`). Pages should compose components only; no large HTML blocks inline.
- Components must receive localized copy through props or slots-avoid hardcoded strings in page templates.
- Register/view components with intuitive kebab-case names and reuse them instead of duplicating markup.

## 3. Dedicated Assets Per Feature
- No inline `<style>` or `<script>` tags in Blade views unless explicitly approved.
- Each component/page has its own CSS/JS module under `resources/css` and `resources/js` (or `resources/js/components`). Import via the Tailwind CLI/NPM build; Vite is not allowed.
- Never install, configure, or run Vite for this repo; stick to the existing Tailwind/Laravel Mix tooling described in the README.
- Shared tokens live in Tailwind config or a `/shared` assets folder; never duplicate utility classes.

## 4. Accessibility & Content Standards
- All text must have EN + AR translations via Lang files or translatable columns.
- Provide alt text, aria labels, and focus states for interactive components.
- Respect RTL layout when implementing styles or animations.

## 5. Assistant Workflow Requirements
- Before editing, open this file and confirm the checklist mentally.
- During reviews, reject changes that violate any rule above.
- When creating new documents/plans, link back to this file under a "Project Rules" heading.

## 6. Quick Checklist (tick mentally before committing)
1. [ ] Blade-only UI components
2. [ ] CSS/JS extracted per component/page
3. [ ] Controllers thin; repository + service layers own business logic
4. [ ] No inline/debug code; linted & formatted
5. [ ] EN/AR content + accessibility hooks ready
6. [ ] Referenced this document in any new planning notes

Failure to follow these guidelines blocks merging until resolved.
****