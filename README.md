# Reading Group Challenges

The purpose of this repository is to allow Cegeka teams to practice what they have learned throughout the various reading groups. At Cegeka, we usually run weekly reading groups where the purpose is to read certain chapters and then discuss them together.

Since all work and no play makes Jack a dull boy, we sometimes alternate the theoretical aspects with practical exercises to try our hands out at different scenarios and then share our code.

The rules are simple:

1. Fork the repository.
2. Navigate to the challenge you want to complete.
3. Write code on your own branch.
4. Discuss with the rest of the team.

If you want to have a look at the solutions developed by the rest of the team, simply have a look at the forks on this GitHub repository.

## Updating your forked repository

In order to update the forked repository, first make sure to define the upstream remote. You only need to do this once:

    git remote add upstream https://github.com/cegekaro/reading-group-challenges

Then whenever you need to update your own fork with the latest changes, simply run the following commands on the local `master` branch:

    git pull --rebase upstream master
    git push -f

Good luck!
