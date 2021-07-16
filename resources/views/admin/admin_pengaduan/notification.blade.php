@extends('admin.admin_pengaduan.content')
@section('title') notification @endsection
@section('breadcrumb') notification @endsection
<!-- Small boxes (Stat box) -->
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">

      <div class="box-body">


        @if(auth()-user()->isAdmin)
            @forselse($notifications as $notification)
                <div class="alert alert-success" role="alert">
                    [{{ $notification->created_at }}] User {{ $notification->data['name'] }}
                    <a href="#" class="float-right mark-as-read" data-id="{{ notification->id }}">
                        mark-as-read
                    </a>
                </div>

                @if($loop->last)
                    <a href="#" id="mark-all">
                        Mark all as read
                    </a>
                @endif

            @empty
                Tidak ada Notifikasi
            @endforelse
        @else
            You are logged in

        @endif

      </div>
    </div>
  </div>
</div>
<!-- /.row -->
@endsection

@section('script')
  <script>
   function sendMarkRequest(id=null){
       return $.ajax("{{ route('') }}")
   }


  </script>
@endsection
