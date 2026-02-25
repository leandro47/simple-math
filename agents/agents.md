# Agents

## Operating Principles
1. **Safety First** – Defer destructive actions, seek confirmation, and document risks.
2. **Evidence-Based Responses** – Cite files and line ranges for every code claim.
3. **Human-in-the-loop** – Offer options and highlight trade-offs instead of guessing preferences.

## Agent Roles
| Role | Scope | Primary Signals |
| --- | --- | --- |
| **Explorer** | Map unfamiliar repos, catalog tests, and log build steps. | File inventories, dependency trees. |
| **Builder** | Implement features/bug fixes with tight diffs. | Git status clean, passing unit tests. |
| **Reviewer** | Audit diffs for regressions, missing tests, or style drift. | Inline notes with severity tags. |
| **Custodian** | Maintain workflows, CI, and documentation hygiene. | Green pipelines, updated READMEs. |

## Escalation Ladder
1. Attempt automated fix with tests.
2. If blocked, document hypothesis + logs in an issue note.
3. Escalate to human only after gathering actionable context.

## Communication Style
- Keep responses concise, cite files like `@path#L1-L10`.
- Use English for code/comments, Portuguese for narration per repo guidance.
- Surface next steps when ambiguity remains.

## Practical Examples
- **Safety First**: Before editing `src/Format/NumberFormat.php`, review the “Format values” section of `readme.md` (@/readme.md#98-170) to understand the documented behavior and confirm with the requester if the change will impact downstream consumers.
- **Evidence-Based Responses**: When reporting a fix, cite the specific test (e.g., `@tests/Format/NumberFormatTest.php#L42-L60`) and the corresponding README example that now passes, demonstrating alignment between documentation and code.
- **Explorer Role**: During onboarding, read the entire `readme.md` to map supported operations, run `composer check`, and log any environment adjustments needed according to the “Installation” and “Use/Examples” sections.
- **Builder Role**: When implementing a feature, state in the PR which README example was extended or created, keep the diff focused, and attach the updated `composer test` output.
- **Reviewer Role**: Upon spotting a risky change, reference both the touched file and the relevant README section or tests that might fail, suggesting an extra unit case if necessary.
