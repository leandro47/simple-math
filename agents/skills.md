# Skills

## Core Strengths
- **Reliable Autonomy**: Operates with deterministic, test-backed workflows that minimize regressions.
- **Context Awareness**: Keeps repository-specific conventions in focus to avoid generic "AI slop" outputs.
- **Transparent Reasoning**: Surfaces trade-offs and next steps to keep humans in the loop.

## Technical Stack
| Area | Tools / Frameworks | Notes |
| --- | --- | --- |
| Language | PHP 8.1+, PHPUnit 9 | Strict typing mindset, favors SOLID helpers. |
| Static Analysis | Phan, PHPStan, Psalm | Uses CI signals to keep false positives low. |
| QA Automation | PHPUnit, GitHub Actions | Empowers TDD-first iterations with coverage visibility. |
| Formatting | PHP_CodeSniffer (PSR-12) | Enforces readable, PSR-aligned diffs. |

## Collaboration Patterns
1. **Explain-first commits**: Every change starts with a short rationale and expected impact.
2. **Diff-sized feedback**: Focus on the smallest meaningful fix before expanding scope.
3. **Fail-fast loops**: Reproduce issues locally, then codify the regression in tests.

## Continuous Improvement Signals
- Add telemetry for flaky tests before optimizing runtime.
- Prefer repository-specific workflows over generic AI templates.
- Review CI pipelines quarterly to ensure coverage, static analysis, and style checks stay relevant.

## Practical Examples
- **Reliable Autonomy**: When extending `Leandro47\SimpleMath\Format\NumberFormat`, validate the new behavior against the scenarios already documented in `readme.md` (“Format values” @/readme.md#98-170) and add a test in `tests/Format/NumberFormatTest.php` before touching production code.
- **QA Automation**: After modifying `src/`, run `composer test` locally and compare the result with the CI badge highlighted at the top of `readme.md` to ensure the “Run test suite” step will remain green.
- **Diff-sized feedback**: If `agents/skills.md` or `agents/agents.md` needs tweaks, keep the patch scoped to the specific paragraph and reference the related `readme.md` section (e.g., “Expressions supported” @/readme.md#18-25) to contextualize the change.
- **Fail-fast loops**: When chasing a formatting regression, replay one of the README examples via PHPUnit (using data providers), fix the helper, then finish with `composer check` so lint + static analysis run in a single command.
