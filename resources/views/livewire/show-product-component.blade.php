{{-- Because she competes with no one, no one can compete with her. --}}


{{--     <span wire:click.prevent="getData">click</span>--}}


<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card card_image_container" onclick="if(this.nextSibling.nextSibling.firstElementChild.firstElementChild.style.display == 'none')
         {this.nextSibling.nextSibling.firstElementChild.firstElementChild.style.display = 'flex'}
         else
             {this.nextSibling.nextSibling.firstElementChild.firstElementChild.style.display = 'none'}">

        <img class="image_card"
             src="{{$product_image}}"/>
        <div class="product_title text-center py-3 text-light fw-bolder">{{ $product_name }}</div>


    </div>

    <div class="row mt-2">
        <div class="m-auto my_product_livewire w-100 text-center ">
            <button wire:click="getData" class="myBtnLiveWire" style="color:white; border: none; background-color: transparent; display: none ">
{{--                <img style="background-color: transparent; " width="25" height="25"--}}
{{--                     src="{{asset('site/images/arrow.png')}}">--}}
                المزيد
            </button>

            <!-- The Modal -->
            <div class="row m-auto" id="myModal" style="background-color: rgba(0,0,0,0.4);
                border-radius: 15px; display: {{$isOpen}};   ">
                <div class="myClass-dialog">
                    <div class="myClass-content">

                        <!-- Modal Header -->
                        <div class="myClass-header text-white p-3">
                            <h5 class="myClass-title">{{optional(@$data->transNow)->name}}</h5>
                            <p class="myClass-title">{{optional(@$data->transNow)->description}}</p>

                        </div>
                        <span class="p-1 btn" style="background-color: transparent; color:white; "
                              wire:click="closeModal">x</span>

                        <!-- Modal body -->


                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




