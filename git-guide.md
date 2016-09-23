Git Practices
=============

As a development team, we interact with each other a lot via Git. This document
sets up guidelines to make this a standardized process with a minimum of
confusion while keeping overall friction low.

This document assumes good knowledge of git, if you need a refresher course take a look at this http://gitolite.com/gcs.html

Table of Contents
-----------------

* [Git Configuration](#git-configuration)
* [Git Branches](#git-branches)
* [Commit Messages](#commit-messages)
* [Code Reviews](#code-reviews)

Git Configuration
=================

1. Make *Git* Push the current branch by default (`simple` means: push the
   current branch to its upstream branch but refuse to push if the upstream
   branch’s name is different from our local one).

   ```
   $ git config push.default simple
   ```

Git Branches
============

Our branch names adhere to one of the following formats:

    TYPE-DESCRIPTION

Breaking things down, the following parts of branch name include:

Type
----
A `TYPE` is one of the following:

* `feature`
* `chore`
* `bug`

Which should correspond to a new feature, a cleanup / logistical chore or
a bug fix.

Description
-----------
A `DESCRIPTION` is a dashed short English description of the task.
For example:

* `add-multiple-users`
* `ie-breaks-on-login`

Full Examples
-------------
So, the following would be good examples of full branch names:

* `feature-add-multiple-users`
* `bug-ie-breaks-on-login`
* `chore-clean-up-readme`

Note that some teams may integrate into GitHub issues or JIRA with
pre-commit hooks and **also** append a numerical identifier to the branch
name to auto-modify commit messages.


Commit Messages
===============

The Git community (starting with the git core collaborators) has some
[conventions][] for writing and formatting good commit messages. Adhering to a
few simple rules helps everyone get the most out of tools like `git log` and
Github.

- The first line is the subject line. Try to keep this under 50 characters to
  avoid truncating it in Github commit history feeds.
- The subject should be in the imperative: "Fix Bug", not "Fixed bug" or
  "Fixes Bug".
- If you want to add more detail to the message, add a blank line (two carriage
  returns after the subject. Then add a body.
- Just like with code, break lines in the body at 80 characters.
- The commit history should tell a story. Write meaningful commit messages!

Example commit message:

```
Add User model

A User has the following properties:
- id
- name
- email
- role
```

Note that this does **not** mean you have to write messages this long. In most
cases, a small commit only needs a one-line comment that concisely describes
the changes.

Further reading: [commit messages][]

[conventions]: http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html
[commit messages]: http://robots.thoughtbot.com/post/48933156625/5-useful-tips-for-a-better-commit-message


Code Reviews
============

All code is developed in small feature branches per our conventions. When that
code is ready for merging to master, the branch must undergo a code review.

Our general goal is that branches are short-lived (on the order of a couple of
days), and that PRs happen frequently as a functional "unit" of code is ready
for primetime. We have a bias towards getting code into master. We also have
high standards, so read on for the workflows.

For this document, "coder" wrote the code, "reviewer" is reviewing the code.

The following steps use GitHub pull requests as our examples for code reviews.

Pull Request Prerequisites
----------------------

Before opening a pull request, please make sure you have done the following locally:

```
# Generate all JS/CSS files.
# < Commit any necessary generated files >
# Check the branch is pull request ready.

Opening a Pull Request
----------------------
The basic workflow is:

* The coder syncs branch with upstream master.
* The coder runs all style and test checks. Everything must pass.
* The coder opens a Pull Request ("PR") in GitHub using the web interface.
* The coder writes a good title. Example: "Bug: IE8 button blows up the world".
* The coder writes a good description of the changes, issues, and anything
  else the team should know.
* The coder CCs the appropriate parties (see "Who to CC?" below) using `/cc @username1 @username2` in the PR text
* The coder creates the PR.
* The coder assigns the PR to a reviewer.

Who to CC?
----------------------

There are certain parties that *must* review your code, and others that *might* need to:

**Required Reviewers** - These parties must review every PR

1. **Tech Lead** - the tech lead for your track.
1. **Team Members** - One or more of your own team members. One of your team members should be the "assigned" reviewer, and it is their responsibility to actually deploy and manually test out the code in question.

**Possible Reviewers** - Check these requirements to see if you need these parties to review your PR

1. **Other Track Leads** - The primary and secondary track lead for any code you're modifying outside of your own track.
1. **Functional Leads** - The functional leads for any specific areas.
1. **Global UI** - Matt Stevens
1. **Other Devs** - Any other specific devs currently working on related functionality who may be affected by these changes.
1. **Code Owners** – You can look for effective owners of specific code with git blame or git history

Unreviewed Pull Requests
------------------------
Sometimes a pull request is the easiest way to get eyes and comments on code,
even if a full pull request isn't ready for review and merging. In this case,
place `[NO REVIEW]` in the title of the PR so folks who aren't specifically
invited for an "early look" don't spend unnecessary time reviewing your changes
before they're ready.

After you finish everything up and are ready for the real merge, then remove
the `[NO REVIEW]` marker and add a comment with `/cc @USER1 @USER2` to ping
everyone who should finally review your full PR for actual approval into
`master`.

Other Pull Request States
-------------------------
In addition to `[NO REVIEW]`, the following title tag / text snippets are
sometimes used:

* `[WIP]`: Signify "work in progress", so as to indicate rough status.
  Informational, not operational.
* `[NO MERGE]`: The PR _should_ be reviewed and approved, but should _not_ be
  merged until some other upstream change lands.

Reviewing a Pull Request
------------------------
Unreviewed PRs block coders, thus it is important for reviewers to clear out
code reviews quickly. Our rough rule is that all PRs open as of the morning
should be reviewed by the end of the day.

However, a coder should let reviewers know of high priority and/or blocking
PRs that need immediate attention and are responsible for driving the reviewer
to work faster than the normal rough rule.

One workflow is:

* The reviewer reviews the code changes, and decides everything looks good.
* Reviewer makes global comment "Approved. /cc CODER"

Another workflow is:

* The reviewer reviews code and sees need for changes or other questions.
* The reviewer adds inlines comments and global PR comments.
* The reviewer then adds global comment to coder saying something like:
  "Reviewed the PR. Some issues. Also, did you consider foo? /cc CODER"
* The coder addresses the comments with comments or code changes.
* The coder adds global comment "Ready for re-review. /cc REVIEWER"
* ... this or the previous workflow starts again ...

Merging a Pull Request
----------------------
The workflow is:

* After approval, the coder checks for any needed upstream merges.
* The coder runs all style and test checks(if avaialble for the project in questions). Everything must pass.
* If upstream merges require non-trivial code changes, ask for review again.
* Be sure that the latest commit in your PR has passed Continuous Integration checks.  See next section for more info.
* Otherwise, use the GitHub web interface to merge the PR.
* Unless the coder explicitly is going to reuse the branch (e.g. for a
  "part two" of a ticket), then the coder deletes the branch using the
  GitHub web interface (which a button is auto-suggested after the merge).
* The ultimate goal is that when a ticket is closed, the branch(es)
  accompanying it are also all closed.

The infrastructure check all developers must run before merging an approved
branch into master (closing the PR) are:

```
# < Pull master to latest and merge in current master changes to branch >

# Generate all JS/CSS files.
# < Commit any necessary generated files >
# Check the branch is pull request ready.

```
Committing Directly to Master, Production, or a Release Branch
----------------------
Under normal circumstances pushing directly to master, production, or any release branch is strongly discouraged.

Helpful Resources
=================

* [Feature branch workflow](https://www.atlassian.com/git/workflows#!workflow-feature-branch)
* [Github flow in the Browser](https://github.com/blog/1557-github-flow-in-the-browser)
* [Github flow](http://scottchacon.com/2011/08/31/github-flow.html)
