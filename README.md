This repository shows the process of refactoring in baby steps as explained in [this post](https://dev.to/xoubaman/refactoring-with-baby-steps-3mgg).

In the context of an application dealing with Scrum and Story Points (e.g. Jira), we refactor a small `SprintReport`
class that uses `int` Story Points to use instead a new `StoryPoint` Value Object (VO) instead.

In each commit we can see how the smallest possible change is applied without breaking the tests, with the final result
of having our method using the VO knowing that our code behaves as expected still since the tests are still green.

As it is a refactor process there are no substantial changes in the tests but only in the code tested.

The steps taken are:

* [c12e4ae](https://github.com/xoubaman/refactoring-with-baby-steps/commit/c12e4ae630d12f5f6ae19b557a6f7270e6834204) - Initial commit with the `SprintReport` class using `int` for Story Points.
* [de72d1a](https://github.com/xoubaman/refactoring-with-baby-steps/commit/de72d1a7d731178a6f06fdb3753cb6467d5b4158) - Add a new (empty) method with a `StoryPoint` as parameter.
* [b9374d1](https://github.com/xoubaman/refactoring-with-baby-steps/commit/b9374d12b9f4b4aeeb561814beeca917c736159c) - Instantiate the `StoryPoint` from the `int`value inside the current method.
* [2d93f79](https://github.com/xoubaman/refactoring-with-baby-steps/commit/2d93f796f7484ba4bd223f50c826665ce043fe5d) - Duplicate the guard clause inside the new method.
* [8d62e4c](https://github.com/xoubaman/refactoring-with-baby-steps/commit/8d62e4c15f847de7fb56af3d2b676debb49193b2) - Call the new method **after** the initial guard clause.
* [1a8abe0](https://github.com/xoubaman/refactoring-with-baby-steps/commit/1a8abe04295537362086c381fb1bcb920f300dec) - Delete the initial guard clause (after commenting it and ensure the tests pass).
* [73f8561](https://github.com/xoubaman/refactoring-with-baby-steps/commit/73f8561408b1c44697832f9aec8d109c403f006f) - Duplicate the increase of story points in the new method, commenting it.
* [64edf9b](https://github.com/xoubaman/refactoring-with-baby-steps/commit/64edf9be15f42f02fc0f97fa617960656965d28f) - After switching which increase is commented, and running the test, delete the increase in the current method.
* [c5b830f](https://github.com/xoubaman/refactoring-with-baby-steps/commit/c5b830f34397b407c7251ac662468dbfe2881e21) - Update the tests to no longer call the current method and call the new one instead.
* [ae3950f](https://github.com/xoubaman/refactoring-with-baby-steps/commit/ae3950fde162a20c537dd6b8bebba71f76c71146) - Rename the new method with a consistent name.

At this point we no longer need story points passed as integers when adding more to the report, but still the report expects an initial value as an integer in its constructor. To avoid it, we do:

* [5425e96](https://github.com/xoubaman/refactoring-with-baby-steps/commit/5425e96fe8c41e6519e4d648508d8f2a048e7961) - Add a new optional parameter to the constructor typed to `StoryPoint`.
* [4917787](https://github.com/xoubaman/refactoring-with-baby-steps/commit/49177871ee076fd716bd046f01b0c9c0e89d5443) - Set the completed value from the VO parameter when provided.
* [b518331](https://github.com/xoubaman/refactoring-with-baby-steps/commit/b518331f6b0425fe1e849aa7f8293ce5d5d5fb38) - Update all constructor usages in tests to receive the new parameter.
* [3a6482e](https://github.com/xoubaman/refactoring-with-baby-steps/commit/3a6482edcc74e6c888b47fe9464f6421ff4a438b) - Duplicate commented the line setting the initial value in the constructor.
* [701f641](https://github.com/xoubaman/refactoring-with-baby-steps/commit/701f641ab8834be31ba516800a0050957e3f8210) - Delete the conditional assignment when the VO is provided after switching the commented block and verify tests are green.
* [5cbd0ad](https://github.com/xoubaman/refactoring-with-baby-steps/commit/5cbd0adaf1c3769fbeb2f48af5891ae8d7c0e5b2) - Refactor the constructor signature to expect the VO as first parameter.
* [d42f3f4](https://github.com/xoubaman/refactoring-with-baby-steps/commit/d42f3f4ec69af1ed02dede24dcedee76dfaa3296) - Refactor the constructor signature to expect only the VO.
* [5a1df06](https://github.com/xoubaman/refactoring-with-baby-steps/commit/5a1df0661700deffc96f8e9b418de5d9fdd79644) - Rename constructor parameter.

Now that there is no reference to integers in the class public API (besides the deprecated method) we can change the `SprintReport` internals to use `StoryPoint` VO as well and push logic belonging to the VO inside it:

* [dc39345](https://github.com/xoubaman/refactoring-with-baby-steps/commit/dc393455221e4ca4fd18e82596171f19ff2b0e8d) - Implement sum operation in `StoryPoint`.
* [1e7c012](https://github.com/xoubaman/refactoring-with-baby-steps/commit/1e7c0129cac264959dd82cdf261a3f6e7522125f) - Optional property for the story points as VO.
* [56feff1](https://github.com/xoubaman/refactoring-with-baby-steps/commit/56feff184678d816a6067c63fd02be45999008dd) - Add the story points using the VO when the new property is set.
* [dbcf36a](https://github.com/xoubaman/refactoring-with-baby-steps/commit/dbcf36a78a333ae84ac26c0c2e5b9fda4550416a) - Set the initial `StoryPoint` VO in the constructor.
* [d3a781b](https://github.com/xoubaman/refactoring-with-baby-steps/commit/d3a781b99f50cf0f25e2f130e3b798445ec61766) - Remove the conditional sum of VO story points when adding more.
* [dc1d21d](https://github.com/xoubaman/refactoring-with-baby-steps/commit/dc1d21db58f8cc730f1cba16c7e8cc5fb55a8fbb) - Remove the int story point property usage.
* [e12daa0](https://github.com/xoubaman/refactoring-with-baby-steps/commit/e12daa06fbb76e8b060f32f4e75f2e8c1dd59dc2) - Clean up `SprintReport` constructor.
* [42cfa07](https://github.com/xoubaman/refactoring-with-baby-steps/commit/42cfa07b09d55baf4aa0649ecec703a958b762f7) - Validate `StoryPoint` value in the constructor.
* [5bc92ee](https://github.com/xoubaman/refactoring-with-baby-steps/commit/5bc92ee3226d1eaf2a5d57d21880eab9642ec823) - Delete `StoryPoint` value validation in `SprintReport`.
* [4507f43](https://github.com/xoubaman/refactoring-with-baby-steps/commit/4507f43c8984cc6519f92413a3a72b3549cf9605) - Delete redundant test from `SprintReport`.




