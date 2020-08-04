<?php $title = 'Email Verification'; ?>
@extends('layouts.app')

@section('content')
<div class="air__layout__content">
    <div class="air__utils__content">
        <div class="col-lg-12">

            <div class="mb-5">
                <div class="mb-5">
                    <div style="width: 100%; background: #f2f4f8; padding: 10px 20px; color: #514d6a;">
                        <div style="max-width: 700px; margin: 0px auto; font-size: 14px">
                            <table style="border-collapse: collapse; border: 0; width: 100%; margin-bottom: 20px">
                                <tr>
                                    <td style="vertical-align: top;">
                                        <img
                                            src="{{ asset('design/components/core/img/favicon.png')}}"
                                            alt="IGR Team"
                                            style="height: 40px"
                                        />
                                    </td>
                                    <td style="text-align: right; vertical-align: middle;">
                                        <span style="color: #a09bb9;">
                                            Laseco
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <div style="padding: 40px 40px 20px 40px; background: #fff;">
                                <table style="border-collapse: collapse; border: 0; width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 style="margin-bottom: 20px; color: #24222f; font-weight: 600">
                                                Account Activation
                                                </h5>
                                                <h6> <b> Dear {{Auth::user()->first_name . " ". Auth::user()->last_name}}, </b></h6> <br>
                                                <p>
                                                    @if (session('resent'))
                                                      <p style="color:green"> A fresh verification link has been sent to  {{ Auth::user()->email}}. </p>
                                                    @endif
                                                    Before proceeding, please check your email for a verification link.
                                                </p>

                                                <p> If you did not receive the email, please click the button below to request a fresh activation link </p>
                                                <div style="text-align: center">
                                                    <a
                                                        href="{{ route('verification.resend') }}"
                                                        style="display: inline-block; padding: 11px 30px 6px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px"
                                                    >
                                                        Activate Your Account
                                                    </a>
                                                </div>

                                                <p>Regards,<br />Jethro Software Ltd</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="text-align: center; font-size: 12px; color: #a09bb9; margin-top: 20px">
                                <p>
                                Jethro Software Ltd., 21 Ladoke Akintola Avenue, New Bodija, Ibadan, Nigeria

                                <br />
                                Powered by Jethro Systems Limited
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
