# Laravel Queue Performance Testing Repo

This repo contains the following Model structure:

* Users belong to many Schools.
* Schools have many Students

## Setup

* `php artisan migrate`
* `php artisan db:seed`

At this point, you'll have a database with `users`, `schools`, and `students`. There is a single User record in the database which belongs to 10 Schools, and each School has 10,000 Students.

To queue up the jobs, run the `php artisan run-example` command. This will queue up two jobs.

* The first job will accept a `User` model. The given model will eagerly load its nested relationships before the job is dispatched.
* The second job will accept the string identifier of the model.

After queueing the jobs, run `php artisan queue:work` to run the jobs. You'll notice the `SampleJobWithModel` takes a few seconds to run, while the `SampleJobWithPrimitive` is nearly instant.