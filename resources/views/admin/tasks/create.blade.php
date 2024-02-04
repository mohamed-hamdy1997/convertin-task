@extends('admin.layouts.layout')
@section('title')
    Create Task
@endsection
@section('content')

    <ol class="breadcrumb text-muted fs-6 fw-semibold mb-6">
        <li class="breadcrumb-item"><a href="{{ route('admin.tasks.view') }}" class="">Tasks</a>
        </li>
        <li class="breadcrumb-item text-muted">Create Task</li>
    </ol>

    <form action="{{ route('admin.tasks.create') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <h3 class='text-main mb-5'>
                    Create Task
                </h3>
            </div>

            <div class="col-md-4">
                <div class="mb-6">
                    <label for="title" class='mb-2'>Title<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control " id="title" required name="title"
                           value="{{ old('title') }}"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-6">
                    <label for="assigned_by_id" class='mb-2'>
                        Admin
                        <span class="text-danger">*</span>
                    </label>
                    <div class="border-select">
                        <select class="form-select select2" id="assigned_by_id" name="assigned_by_id"
                                data-placeholder="Select an option" data-hide-search="true" required>
                            <option value="" selected disabled>Select Admin</option>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}"
                                        @if(old('assigned_by_id') == $admin->id) selected @endif>{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-6">
                    <label for="assigned_by_id" class='mb-2'>
                        User
                        <span class="text-danger">*</span>
                    </label>
                    <div class="border-select">
                        <select class="form-select select2" id="assigned_to_id" name="assigned_to_id"
                                data-placeholder="Select an option" data-hide-search="true" required>
                            <option value="" selected disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if(old('assigned_to_id') == $user->id) selected @endif>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mb-6">
                    <label for="description" class='mb-2'>Description<span class="text-danger">*</span>
                    </label>
                    <textarea rows="3"  class="form-control " id="description" required name="description">{{ old('description') }}</textarea>
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            <i class="ki-duotone ki-plus fs-2"></i>
            Create Task
        </button>

    </form>

    <!--end::App-->
@endsection
