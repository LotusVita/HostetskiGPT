@extends('layouts.app')

@section('title_full', 'HostetskiGPT - ' . $mailbox->name)

@section('body_attrs')@parent data-mailbox_id="{{ $mailbox->id }}"@endsection

@section('sidebar')
    @include('partials/sidebar_menu_toggle')
    @include('mailboxes/sidebar_menu')
@endsection

@section('content')
    <div class="section-heading">
        HostetskiGPT
    </div>
    <div class="col-xs-12">
        <form class="form-horizontal margin-top margin-bottom" method="POST" action="">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="auto_reply_enabled" class="col-sm-2 control-label">{{ __("Enable GPT") }}</label>

                <div class="col-sm-6">
                    <div class="controls">
                        <div class="onoffswitch-wrap">
                            <div class="onoffswitch">
                                <input type="checkbox" name="gpt_enabled" id="gpt_enabled" class="onoffswitch-checkbox"
                                    {!! $settings['enabled'] ? "checked" : "" !!}
                                >
                                <label class="onoffswitch-label" for="gpt_enabled"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{ __("OpenAI API key") }}</label>

                <div class="col-sm-6">
                    <input name="api_key" class="form-control" placeholder="sk-..." value="{{ $settings['api_key'] }}" required />
                </div>
            </div>

            <div class="form-group margin-top">
                <label class="col-sm-2 control-label">{{ __("Token limit") }}</label>

                <div class="col-sm-6">
                    <input name="token_limit" class="form-control" placeholder="1024" type="number" value="{{ $settings['token_limit'] }}" required />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{ __("Prompts") }}</label>

                <div class="col-sm-6">
                    <textarea name="start_message" class="form-control" placeholder="Act like a support agent" required>{{ $settings['start_message'] }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">{{ __("Model") }}</label>

                <div class="col-sm-6">
                    <select id="model" class="form-control input-sized" name="model" required>
                        <option value="gpt-4" {!! $settings['model'] == "gpt-4" ? "selected" : "" !!}>gpt-4</option>
                        <option value="gpt-3.5-turbo" {!! $settings['model'] == "gpt-3.5-turbo" ? "selected" : "" !!}>gpt-3.5-turbo</option>
                    </select>
                </div>
            </div>

            <div class="form-group margin-top margin-bottom">
                <div class="col-sm-6 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __("Save") }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('body_bottom')
    @parent
    
@endsection
