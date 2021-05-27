# amti_2016

WordPress site for [AMTI](https://amti.csis.org/). Developed from the [\_s starter theme](http://underscores.me). It uses gulp, Sass, Autoprefixer, PostCSS, imagemin, and Browsersync to speed-up development.

**Note:** This theme was originally created in 2016, and does not reflect the current code standards of the CSIS iLab. While the structure of the project is similar to the [CSIS Starter](https://github.com/CSIS-iLab/csisstarter_wp), they are not identical. Style linting has been disabled on this project.

## Table of Contents

- [Quick-Start Instructions](#quick-start-instructions)
- [Usage](#usage)
  - [CI/CD](#build-for-production)
  - [See More Commands](#see-more-commands)
- [Contributing](#contributing)

## Quick-start Instructions

To begin development, navigate to `wp_content/themes/amti` directory and start npm.

```shell
$ cd wp-content/themes/amti
$ npm install
$ npm start
```

### CI/CD

GitHub Actions will automatically build & deploy the theme to either the development, staging, or production environment on WPE depending on the settings specified in the deployment workflow.

- Pull requests into `main` will be deployed to the [WP Engine Development Environment](https://amtidev.wpengine.com/). The Development environment should be used to demo new features to programs. Once approved, a pull request should be submitted to `main`.

### See More Commands

This will display all available commands, such as running eslint or imagemin independently.

```shell
$ npm run
```

## Contributing

### Branching

When modifying the code base, always make a new branch. Unless it's necessary to do otherwise, all branches should be created off of `main`.

Branches should use the following naming conventions:

| Branch type               | Name                                                      | Example                     |
| ------------------------- | --------------------------------------------------------- | --------------------------- |
| New Feature               | `feature/<short description of feature>`                  | `feature/header-navigation` |
| Bug Fixes                 | `bug/<short description of bug>`                          | `bug/mobile-navigation`     |
| Documentation             | `docs/<short description of documentation being updated>` | `docs/readme`               |
| Code clean-up/refactoring | `refactor/<short description>`                            | `refactor/apply-linting`    |
| Content Updates           | `content/<short description of content>`                  | `content/add-new-posts`     |

### Commit Messages

Write clear and concise commit messages describing the changes you are making and why. If there are any issues associated with the commit, include the issue # in the commit title.

## Copyright / License Info

Copyright © 2021 CSIS iDeas Lab under the [MIT License](https://github.com/CSIS-iLab/csisstarter_wp/blob/main/LICENSE).
