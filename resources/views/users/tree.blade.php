@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')

<div class="tree" style="margin:auto;display:flex;">
    <ul id="ul1">
        <li>
        <div class="label1" style="display:flex;height:180px;width:130px;margin:auto;padding:10px 20px;border:2px solid #EACE56;border-radius: 50px">
            <div>
            {{ userPhoto($user, ['onclick'=>'window.open(this.src)','style' => 'width:88px;height: 100px;border-radius: 50px;']) }}
            <p class="" style="color:#000;">{{ link_to_route('users.tree', $user->name, [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }}</br>({{ $user->gender }})
                
            </p>
            </div>
            

        </div>   
        @if ($user->childs->count())
            <ul id="ul2" style="display:flex">
                @foreach($user->childs as $child)
                <li>
                <div class="label2" style="display:flex;align-items:center;justify-content:center;border:2px solid #EACE56;border-radius: 50px;height:180px;width:130px;padding:20px;margin:auto">
                    <div style="">
                        {{ userPhoto($child, ['onclick'=>'window.open(this.src)','style' => 'width:88px;height: 100px;border-radius: 50px']) }}
                        <p style="margin: 0px 0px;">{{ link_to_route('users.tree', $child->name, [$child->id], ['title' => $child->name.' ('.$child->gender.')']) }} 
                            <span class="" style="color:#000;"></br>({{ $child->gender }})
                        </p> 
                    </div>                        
                    
                </div>
                        </span>
                @if ($child->childs->count())
                    <ul id="ul3" style="display:flex">
                        @foreach($child->childs as $grand)
                        <li>
                        <div class="label3" style="display:flex;align-items:center;justify-content:center;border:2px solid #EACE56;border-radius: 50px;height:180px;width:130px;padding:20px;margin:auto">
                            <div style="">
                            {{ userPhoto($grand, ['onclick'=>'window.open(this.src)','style' => 'width:88px;height: 88px;border-radius: 50px;padding-top:5px;']) }}
                        <p style="margin: 0px 0px;">{{ link_to_route('users.tree', $grand->name, [$grand->id], ['title' => $grand->name.' ('.$grand->gender.')']) }}
                            <span class="" style="color:#000;"></br>({{ $grand->gender }})</p></span>
                            </p>
                        </div>
                    </div>
                        @if ($grand->childs->count())
                            <ul id="ul4" style="display:flex">
                                @foreach($grand->childs as $gg)
                                <li>
                                <div class="label4" style="display:flex;align-items:center;justify-content:center;border:2px solid #EACE56;border-radius: 50px;height:180px;width:130px;padding:20px;margin:auto">
                                <div style="">
                                {{ userPhoto($gg, ['onclick'=>'window.open(this.src)','style' => 'width:88px;height: 88px;border-radius: 50px;']) }}
                                <p style ="margin: 0px 0px">{{ link_to_route('users.tree', $gg->name, [$gg->id], ['title' => $gg->name.' ('.$gg->gender.')']) }}
                                    <span class="" style="color:#000;"></br>({{ $gg->gender }})</p> </span>
                                        </span>
                                    </div>
                                </div>
                                <?php /*
                                    @if ($gg->childs->count())
                                    <ul>
                                        @foreach($gg->childs as $ggc)
                                        <li>
                                            {{ link_to_route('users.tree', $ggc->id, [$ggc->id], ['title' => $ggc->name.' ('.$ggc->gender.')']) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    */ ?>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection
