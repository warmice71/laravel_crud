<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel 10 Crud Tutorial Example</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-2">
            <div class=""row>
                <div class=""col-lg-12 margin-tb>
                    <div class="pull-left" >
                        <h2>Laravel 10 Crud example Tutorial</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('companies.create')}}">create company</a>

                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th width="">Company Name</th>
                        <th width="">Company Email</th>
                        <th width="">Company Address</th>
                        <th width="">Phone Number</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->number }}</td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                                <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $companies->links() !!}
        </div>
    </body>    
</html>