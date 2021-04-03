This repository shows the process of refactoring in baby steps as explained in [FIXME: link to post when any].

In the context of an application dealing with Scrum and Story Points (e.g. Jira), we refactor a small `SprintReport`
class that uses `int` Story Points to use instead a new `StoryPoint` Value Object (VO) instead.

In each commit we can see how the smallest possible change is applied without breaking the tests, with the final result
of having our method using the VO knowing that our code behaves as expected still since the tests are still green.

As it is a refactor process there are no substantial changes in the tests but only in the code tested.

The steps taken are:

* [XXX] Initial commit with the `SprintReport` class using `int` for Story Points.
* [XXX] Adding an empty method with a `StoryPoint` as parameter.

