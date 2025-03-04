# webproject
# Project Setup Guide

## 1. Cloning the Repository

To get started, clone the empty repository to your local machine:

```bash

# Using HTTPS
git clone https://github.com/AYAAMB/portfolio.git
```

Then, navigate to the project directory:

```bash
cd your-repo
```

## 2. Creating Your Branch

Each team member should create a new branch using their name:

```bash
git checkout -b your-name
```

Push your new branch to the remote repository:

```bash
git push origin your-name
```

## 3. Working with Branches

### Switching to Your Branch

```bash
git checkout your-name
```

### Pulling Latest Changes
Always pull the latest changes from `main` before starting work:

```bash
git checkout main
git pull origin main
git checkout your-name
git merge main
```

### Pushing Changes

After making your changes, commit them and push:

```bash
git add .
git commit -m "Your commit message"
git push origin your-branche
```

### Creating a Pull Request
Once your work is done, go to GitHub and create a Pull Request (PR) to merge your branch into `main`.


## 5. Contribution Guidelines

- Always work on a new branch named after yourself.
- Follow coding standards and project conventions.
- Test your changes before pushing.
- Add relevant documentation if required.

---
For any questions, feel free to reach out to the team!

