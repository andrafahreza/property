@extends('back.layouts.app')

@section('content')
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="iq-email-list">
                        <div class="iq-email-ui nav flex-column nav-pills">
                            <li class="nav-link active" role="tab" data-toggle="pill" href="#mail-inbox">
                                <a href="#">
                                    <i class="ri-mail-line"></i>Inbox
                                    @if ($datas->where('read', false)->count() > 0)
                                        <span class="badge badge-primary ml-2">{{ $datas->where('read', false)->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-link" role="tab" data-toggle="pill" href="#mail-starred">
                                <a href="#">
                                    <i class="ri-star-line"></i>Starred
                                    @if ($stars->where('read', false)->count() > 0)
                                        <span class="badge badge-primary ml-2">{{ $stars->where('read', false)->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-link" role="tab" data-toggle="pill" href="#mail-trash">
                                <a href="#">
                                    <i class="ri-delete-bin-line"></i>Trash
                                    @if ($trash->where('read', false)->count() > 0)
                                        <span class="badge badge-primary ml-2">{{ $trash->where('read', false)->count() }}</span>
                                    @endif
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 mail-box-detail">
        <div class="card">
            <div class="card-body p-0">
                <div class="">
                    <div class="iq-email-to-list p-3"></div>
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                                <ul class="iq-email-sender-list">
                                    @foreach ($datas as $data)
                                        <li class="@if ($data->read == false) iq-unread @endif">
                                            <div class="d-flex align-self-center">
                                                <div class="iq-email-sender-info">
                                                    <span class="ri-star-line iq-star-toggle @if ($data->star == true) text-warning @endif"></span>
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-title">{{ $data->name }}</a>
                                                </div>
                                                <div class="iq-email-content">
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-subject">
                                                        {!! Str::limit($data->message, 100, '...') !!}
                                                    </a>
                                                    <div class="iq-email-date">{{ date('H:i', strtotime($data->created_at)) }}</div>
                                                </div>
                                                <ul class="iq-social-media">
                                                    <li><a href="{{ route('trash-message', ['id' => $data->id]) }}"><i class="ri-delete-bin-line"></i></a></li>
                                                    <li><a href="{{ route('star-message', ['id' => $data->id]) }}"><i class="ri-star-line"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="mail-starred" role="tabpanel">
                                <ul class="iq-email-sender-list">
                                    @foreach ($stars as $data)
                                        <li class="@if ($data->read == false) iq-unread @endif">
                                            <div class="d-flex align-self-center">
                                                <div class="iq-email-sender-info">
                                                    <span class="ri-star-line iq-star-toggle @if ($data->star == true) text-warning @endif"></span>
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-title">{{ $data->name }}</a>
                                                </div>
                                                <div class="iq-email-content">
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-subject">
                                                        {!! Str::limit($data->message, 100, '...') !!}
                                                    </a>
                                                    <div class="iq-email-date">{{ date('H:i', strtotime($data->created_at)) }}</div>
                                                </div>
                                                <ul class="iq-social-media">
                                                    <li><a href="{{ route('trash-message', ['id' => $data->id]) }}"><i class="ri-delete-bin-line"></i></a></li>
                                                    <li><a href="{{ route('star-message', ['id' => $data->id]) }}"><i class="ri-star-line"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="mail-trash" role="tabpanel">
                                <ul class="iq-email-sender-list">
                                    @foreach ($trash as $data)
                                        <li class="@if ($data->read == false) iq-unread @endif">
                                            <div class="d-flex align-self-center">
                                                <div class="iq-email-sender-info">
                                                    <span class="ri-star-line iq-star-toggle text-warning"></span>
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-title">{{ $data->name }}</a>
                                                </div>
                                                <div class="iq-email-content">
                                                    <a href="{{ route('read-message', ['id' => $data->id]) }}" class="iq-email-subject">
                                                        {!! Str::limit($data->message, 100, '...') !!}
                                                    </a>
                                                    <div class="iq-email-date">{{ date('H:i', strtotime($data->created_at)) }}</div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
