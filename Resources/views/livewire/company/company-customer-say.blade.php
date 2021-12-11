<div class="main-wraper">
    <h5 class="main-title">Customer Say
        @if ($isCurrantUser && Auth::user()->can('customer-say-create'))
        <div class="more">
            <div class="more-post-optns">
                <i class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-more-horizontal">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg></i>
                <ul>
                    <li wire:click='setCustomerSayCreateModal()' class="customer-say-opearition">
                        <a><i class="icofont-pen-alt-1"></i>Create</a>

                    </li>
                </ul>
            </div>
        </div>
        @endif
    </h5>
    @can('customer-say-list')
    <div class="info-block-list">
        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-divider">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Say</th>
                        <th>Image</th>
                        @if ($isCurrantUser)
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customerSays as $customerSay)
                    <tr>
                        <td>{{$customerSay->customer_name}}</td>
                        <td>{{$customerSay->customer_say}}</td>
                        <td>
                            <figure>
                                <img src="{{ asset('storage/'.$customerSay->customer_image)}}">
                            </figure>

                        </td>
                        @if ($isCurrantUser)
                        <td>
                            @can('customer-say-delete')
                            <i class="" wire:click="deleteCustomerSay({{$customerSay->id}})" style="cursor: pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </i>
                            @endcan

                            @can('customer-say-edit')
                            <i wire:click="editUserCustomerSay({{$customerSay->id}})"
                                class="customer-say-opearition icofont-pen-alt-1" style="cursor: pointer"></i>
                            @endcan

                        </td>
                        @endif

                    </tr>
                    @empty
                    <td></td>
                    <td></td>
                    @if ($isCurrantUser)
                    <td></td>
                    @endif
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endcan

    @if (Auth::user()->can('customer-say-create') || Auth::user()->can('customer-say-edit'))
    <div class="customer-say-opearition-popup" wire:ignore.self>
        <div class="popup">
            <span class="popup-closed"><i class="icofont-close"></i></span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5><i>
                            <svg class="feather feather-message-square" stroke-linejoin="round" stroke-linecap="round"
                                stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg></i> {{$modal['title']}}</h5>
                </div>
                <div class="send-message">
                    <form method="post" class="c-form">

                        <input type="text" wire:model.defer="name" placeholder="Enter Customer Name..">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror

                        <input type="text" wire:model.defer="say" placeholder="Enter Customer Say">
                        @error('say')<span class="text-danger">{{ $message }}</span>@enderror

                        @if($modal['name'] == "Update")
                        <img src="{{ asset('storage/'.$image)}}" class="w-50 p-4">
                        @endif

                        <div class="uploadimage">
                            <i class="icofont-eye-alt-alt"></i>
                            <label class="fileContainer">
                                <input wire:model.defer="image" type="file">Upload Photo
                                <div wire:loading wire:target="image" class="sp sp-circle"></div>
                            </label>
                        </div>
                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        <button wire:click.prevent="{{$modal['route']}}" type="submit" class="main-btn">
                            <div wire:loading wire:target="{{$modal['route']}}" class="sp sp-circle"></div>
                            {{$modal['name']}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
