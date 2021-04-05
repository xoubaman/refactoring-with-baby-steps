This repository shows the process of refactoring in baby steps as explained in [FIXME: link to post when any].

In the context of an application dealing with Scrum and Story Points (e.g. Jira), we refactor a small `SprintReport`
class that uses `int` Story Points to use instead a new `StoryPoint` Value Object (VO) instead.

In each commit we can see how the smallest possible change is applied without breaking the tests, with the final result
of having our method using the VO knowing that our code behaves as expected still since the tests are still green.

As it is a refactor process there are no substantial changes in the tests but only in the code tested.

The steps taken are:

* [XXX] Initial commit with the `SprintReport` class using `int` for Story Points.
* [XXX] Add a new (empty) method with a `StoryPoint` as parameter.
* [XXX] Instantiate the `StoryPoint` from the `int`value inside the current method.
* [XXX] Duplicate the guard clause inside the new method.
* [XXX] Call the new method **after** the initial guard clause.
* [XXX] Delete the initial guard clause (after commenting it and ensure the tests pass).
* [XXX] Duplicate the increase of story points in the new method, commenting it.
* [XXX] After switching which increase is commented, and running the test, delete the increase in the current method.
* [XXX] Update the tests to no longer call the current method and call the new one instead.
* [XXX] Rename the new method with a consistent name.

At this point we no longer need story points passed as integers when adding more to the report, but still the report expects an initial value as an integer in its constructor. To avoid it, we do:

* [XXX] Add a new optional parameter to the constructor typed to `StoryPoint`.
* [XXX] Update all constructor usages in tests to receive the new parameter.
* [XXX] Set the completed value from the VO parameter when provided.
* [XXX] Duplicate commented the line setting the initial value in the constructor.
* [XXX] Delete the conditional assignment when the VO is provided after switching the commented block and verify tests are green.
* [XXX] Refactor the constructor signature to expect the VO as first parameter.
* [XXX] Refactor the constructor signature to expect only the VO.
* [XXX] Rename constructor parameter.

Now that there is no reference to integers in the class public API (besides the deprecated method) we can change the `SprintReport` internals to use `StoryPoint` VO as well and push logic belonging to the VO inside it:

* [XXX] Implement sum operation in `StoryPoint`.
* [XXX] Optional property for the story points as VO.
* [XXX] Add the story points using the VO when the new property is set.
* [XXX] Set the initial `StoryPoint` VO in the constructor.
* [XXX] Remove the conditional sum of VO story points when adding more.
* [XXX] Remove the int story point property usage.
* [XXX] Clean up `SprintReport` constructor.

* [XXX] Validate `StoryPoint` value in the constructor.




