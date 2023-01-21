<!-- Page header -->
<section class="content-header">
    <h1>{{$title}}</h1>
    <a href="{{route('users.create')}}" class="btn btn-success">{{ __('Create') }}</a>

</section>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- Hover rows -->
    <div class="card">
        <div class="table-responsive">
            @if($items)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Fullname') }}</th>
                        <th>{{ __('email') }}</th>
                        <th>{{ __('Actions') }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->fullname}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('users.edit',['user'=>$item->id])}}"
                                   class="btn btn-primary btn-labeled">{{ __('Edit') }}
                                </a>


                                <form method="post"  action="{{route('users.delete',['user'=>$item->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger">{{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <div style="display:none">
                        <form method="post" id="contact-applications-delete" action="">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <!-- /hover rows -->

</div>
<!-- /content area -->
