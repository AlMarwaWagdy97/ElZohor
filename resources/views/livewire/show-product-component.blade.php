{{-- Because she competes with no one, no one can compete with her. --}}


{{--     <span wire:click.prevent="getData">click</span>--}}

<div class="col-lg-4 col-6  mb-4">
    <div class="card card_image_container"  wire:click="getData"  style="background-color: {{$product_back_ground_color}}">

        <img class="image_card"
             src="{{$product_image}}"/>
        <div class="product_title text-center py-3 text-light fw-bolder">{{ $product_name }}</div>


    </div>

    <div class="row mt-2" >
        <div class="m-auto my_product_livewire  text-center " >
{{--            <button wire:click="getData" class="myBtnLiveWire" style="color:white; border: none; background-color: transparent; display: none ">--}}
{{--                <img style="background-color: transparent; " width="25" height="25"--}}
{{--                     src="{{asset('site/images/arrow.png')}}">--}}
{{--                المزيد--}}
{{--            </button>--}}

            <!-- The Modal -->
            <div class="row m-auto" id="myModal" style="background-color: rgba(0,0,0,0.4);
                 display: {{$isOpen}};  border:2px solid var(--main-bg-purple-second-color); border-radius: 15px;    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                "  >
                <div class="myClass-dialog">
                    <div class="myClass-content">

                        <!-- Modal Header -->
                        <div class="myClass-header text-white p-3">
                            <h5 class="myClass-title">{{$product_name}}</h5>
                            <p class="myClass-title">{!!  $product_description !!}</p>

                        </div>
                        <span class="p-1 mb-3 btn cart_p" style="font-size: 18px; font-weight: bold; background-color: transparent; color: var(--main-bg-purple-second-color); border-radius: 15px;  "
                              wire:click="closeModal">x</span>

                        <!-- Modal body -->


                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




