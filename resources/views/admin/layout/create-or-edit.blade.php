@extends("layouts.admin")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="@yield("form-action")" method="POST">
                @yield("form-method")
                @csrf

                <div class="mb-3">
                    <label for="Project Name" class="form-label">Project's Name</label>
                    <input type="text" class="form-control" id="project-name" name="name"
                    value="{{old("name", $project->name)}}">
                    @error("name")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    @error("categories")
                        <div class="alert alert-danger mb-3">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="btn-grou flex-wrap d-flex" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ($technologies as $technology)
                            @if ($errors->any())
                            <input name="technologies[]" type="checkbox" class="btn-check" id="technology-check-{{$technology->id }}"
                            autocomplete="off" value="{{$technology->id}}" {{in_array($technologies->id, old($technologies, [])) ? "checked" : ""}}>

                            @else
                            <input name="technologies[]" type="checkbox" class="btn-check" id="technology-check-{{$technology->id }}"
                            autocomplete="off" value="{{$technology->id}}" {{($project->technologies->contains($technology)) ? "checked" : ""}}>
                            @enderror

                            <label for="technologies-check-{{$technology->id}}" class="btn btn-outline-primary mb-2">
                                {{$technology->name}}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Project description" class="form-label">Project's Description</label>
                    <input type="text" class="form-control" id="project-description" name="description"
                    value="{{old("description", $project->description)}}">
                    @error("description")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Project client" class="form-label">Project's client</label>
                    <input type="text" class="form-control" id="project-client" name="client"
                    value="{{old("client", $project->client)}}">
                    @error("client")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Project Finish Date" class="form-label">Project's end date</label>
                    <input type="date" class="form-control" id="project-end-date" name="end_date"
                    value="{{old("end_date", $project->end_date)}}">
                    @error("end_date")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Project budget" class="form-label">Project's budget</label>
                    <input type="text" class="form-control" id="project-budget"name="budget"
                    value="{{old("budget", $project->budget)}}">
                    @error("budget")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Project repository" class="form-label">Project's repository</label>
                    <input type="text" class="form-control" id="project-repository" name="repository"
                    value="{{old("repository", $project->repository)}}">
                    @error("repository")
                    <div>
                        {{$message}}
                    </div>
                    @enderror
                </div>


                <input type="submit" class="btn btn-primary" value="@yield("input-value-text")"></input>
            </form>
        </div>
    </div>
</div>
@endsection
