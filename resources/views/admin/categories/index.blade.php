@extends('layouts.app')

@section('content')

    @include('admin.includes.error')
    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Category name
                </th>
                <th>
                    Editing
                </th>
                <th>
                    Deleting
                </th>
                </thead>

                <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>

                                {{--Pass the id to edit--}}
                                <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </td>

                            <td>
                                <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-xs btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No categories yet.</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop
