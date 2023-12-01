@extends('back.layouts.app')

@section('content')
    <div class="col-md-3"></div>
    <div class="col-lg-6 mail-box-detail">
        <div class="card">
            <div class="card-body p-0">
                <div class="">
                    <div class="iq-email-to-list p-3"></div>
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                                <ul class="iq-email-sender-list">
                                    <div class="email-app-details show">
                                        <div class="card">
                                            <div class="card-body p-0" style="height: 100%">
                                                <div class="">
                                                    <div class="iq-email-to-list p-3">
                                                        <div class="d-flex justify-content-between">
                                                            <ul>
                                                                <li class="mr-3">
                                                                    <a href="{{ route('message') }}">
                                                                        <h4 class="m-0">
                                                                            <i class="ri-arrow-left-line"></i>
                                                                        </h4>
                                                                    </a>
                                                                </li>
                                                                @if ($data->trash == false)
                                                                    <li data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <a href="{{ route('trash-message', ['id' => $data->id]) }}">
                                                                            <i class="ri-delete-bin-line"></i>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-0">
                                                    <div class="iq-inbox-subject p-3">
                                                        <h5 class="mt-0 mb-3">{{ $data->subject }}</h5>
                                                        <div class="iq-inbox-subject-info">
                                                            <div class="iq-subject-info">
                                                                <img src="{{ asset('back/assets/images/user/user-1.jpg') }}"
                                                                    class="img-fluid rounded avatar-100"
                                                                    alt="#">
                                                                <div class="iq-subject-status align-self-center">
                                                                    <h6 class="mb-0">{{ $data->name }}</h6>
                                                                    <small>{{ $data->whatsapp }}</small>
                                                                </div>
                                                                <span class="float-right align-self-center">{{ date('d-m-Y H:i:s', strtotime($data->created_at)) }}</span>
                                                            </div>
                                                            <div class="iq-inbox-body mt-5">
                                                                {!! $data->message !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

