@extends ('admin.admin_master')

@section ('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home About</h4>
                <a href=" {{ route('add.about') }} "> <button class="btn btn-info"> Add About </button> </a>
                <br><br>
                <div class="col-md-8">
                    <div class="card">

                        @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong> You should check in on some of those fields below.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card-header"> All About Data </div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No</th>
                                    <th scope="col" width="15%">About Title</th>
                                    <th scope="col" width="25%">Short Description</th>
                                    <th scope="col" width="15%">Long Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($homeabout as $about)  
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_dis }}</td>
                                        <td>{{ $about->long_dis }}</td>
                                        <th scope="col">
                                            <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                            <a href=" {{ url('about/delete/'.$about->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete the image?');">Delete</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $sliders->links() }} --}}
                        </div>
                    </div>
            </div>
        </div>

    </div>

@endsection