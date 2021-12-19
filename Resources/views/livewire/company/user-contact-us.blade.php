<div class="tab-pane fade " id="contact" wire:ignore.self>
    @include('components.loading')
    <div class="main-wraper">
        <h5 class="main-title">Address
            @if ($isCurrantUser && Auth::user()->can("address-create"))
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
                        <li wire:click='setCreateModal()' class="address-op">
                            <a><i class="icofont-pen-alt-1"></i>Create</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </h5>
        @can('address-list')
        <div class="info-block-list">
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Phone</th>
                            @if ($isCurrantUser)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($addresses as $address)
                        <tr id="address-{{$address->id}}">
                            <td>{{$address->address}}</td>
                            <td>{{$address->phones}}</td>
                            @if ($isCurrantUser)
                            <td><i class="" wire:click="deleteUserAddress({{$address->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg></i>

                                <i wire:click="editUserAddress({{$address->id}})"
                                    class="address-op icofont-pen-alt-1"></i>
                            </td>
                            @endif

                        </tr>
                        @empty
                        Not Available
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endcan

    </div>

    <div class="main-wraper">
        <h4 class="main-title">Information
            @if ($isCurrantUser && Auth::user()->can("information-edit"))
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
                        <li class="edit-contact-us">
                            <a><i class="icofont-pen-alt-1"></i>Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </h4>
        <div class="uni-info">
            @can('information-list')
            <ul>

                <li>
                    <span>Website</span>
                    <p><a href="{{$website}}"> {{$contact->website ?? 'Not Available'}}</a></p>
                </li>
                <li>
                    <span>Phone</span>
                    <p>{{$contact->phone ?? 'Not Available'}}</p>
                </li>
                <li>
                    <span>Email</span>
                    <p>{{$contact->email ?? 'Not Available'}}</p>
                </li>
            </ul>
            @endcan

        </div>
    </div>

    <div class="main-wraper">
        <h4 class="main-title">Socials
            @if ($isCurrantUser && Auth::user()->can("social-media-edit"))
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
                        <li class="edit-social-media">
                            <a><i class="icofont-pen-alt-1"></i>Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </h4>
        <ul class="socials">
            @can('social-media-list')


            @if ($facebook)
            <li class="facebook">
                <i class="icofont-facebook"></i><a href="#" title="">{{$facebook}}</a>
            </li>
            @endif

            @if ($twitter)
            <li class="twitter">
                <i class="icofont-twitter"></i><a href="#" title="">{{$twitter}}</a>
            </li>
            @endif

            @if ($instegram)
            <li class="google">
                <i class="icofont-instagram"></i><a href="#" title="">{{$instegram}}</a>
            </li>
            @endif

            @if ($whatsApp)
            <li class="google">
                <i class="icofont-whatsapp"></i><a href="#" title="">{{$whatsApp}}</a>
            </li>
            @endif
            @endcan

        </ul>
    </div>

    @include('usermodule::website.company.modals.edit_information')


</div>
