<tr>
    <td style="background-repeat:repeat-x;" background="{{asset('images/nav-bg.jpg')}}" height="46" valign="top"
        width="970">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="955">
            <tbody>
            <tr>
                <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5"></td>
                <td align="center" valign="middle" width="130">
                    <div style="padding-top:3px;"><a href="{{ url('/') }}" class="navbar2">ホーム</a></div>
                </td>
                @if(\Illuminate\Support\Facades\Auth::guard()->check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('admin.schedule') }}"
                                                             class="navbar2">予約確認</a></div>
                        </td>
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('admin.dealer') }}"
                                                             class="navbar2">ゲームを管理</a></div>
                        </td>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->role === 'manager')
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('manager.users') }}"
                                                             class="navbar2">ユーザー</a></div>
                        </td>
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('manager.pay') }}" class="navbar2">レンタル</a>
                            </div>
                        </td>
                    @else
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('user.schedule') }}"
                                                             class="navbar2">予約状況</a></div>
                        </td>
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('user.enterChat') }}"
                                                             class="navbar2">チャット</a></div>
                        </td>
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('user.rental') }}" class="navbar2">レンタル</a>
                            </div>
                        <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5">
                        </td>
                        <td align="center" valign="middle" width="130">
                            <div style="padding-top:3px;"><a href="{{ route('user.vip') }}" class="navbar2">VIP</a>
                            </div>
                        </td>
                    @endif
                @endif
                <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5"></td>
                <td align="center" valign="middle" width="130">
                    <div style="padding-top:3px;"><a href="{{ route('privacy') }}" class="navbar2">案内説明</a></div>
                </td>

                <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5"></td>
                @if(\Illuminate\Support\Facades\Auth::guard()->check())
                    <td align="center" valign="middle" width="130">
                        <div style="padding-top:3px;"><a href="#"
                                                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                         class="navbar2">ログアウト</a></div>
                    </td>
                @else
                    <td align="center" valign="middle" width="130">
                        <div style="padding-top:3px;"><a href="{{route('register')}}" class="navbar2">登録</a></div>
                    </td>
                @endif
                <td valign="top" width="5"><img src="{{asset('images/nav-dvd.jpg')}}" height="46" width="5"></td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>
