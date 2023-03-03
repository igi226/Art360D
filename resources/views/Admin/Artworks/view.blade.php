@extends('Admin.Master.masterLayout')
@section('title', 'View-Artwork | Art360')
@section('content')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Artwork details</h4>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($artwork->artwork_images as $a_image)
                        <div class="col-md-3">
                            <div class="mySlides">
                                <div class="numbertext">{{ $loop->iteration }} / {{ $artwork->artwork_images->count() }}
                                </div>
                                @if (isset($a_image->image) &&
                                        !empty($a_image->image && File::exists(public_path('storage/ArtworkImage/' . $a_image->image))))
                                    <img src="{{ asset('storage/ArtworkImage/' . $a_image->image) }}" style="width:100%"
                                        height="200px">
                                @else
                                    <img src="{{ asset('noimg.png') }}" style="width:100%">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="card custom-shadow rounded-lg border">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 mb-3">

                                <div class="row">
                                    <div class="col-md-6">
                                        Artwork Name:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->title }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Artist Name:
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="fw-bold">{{ $artwork->artistUsers->first_name . ' ' . $artwork->artistUsers->last_name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Year created:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->year_created }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Medium:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->medium }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Category:
                                    </div>
                                    <div class="col-md-6">
                                        @foreach (explode(',', $artwork->category_ids) as $category_id)
                                            @php
                                                $C_name = DB::table('artwork_categories')
                                                    ->where('id', $category_id)
                                                    ->select('name')
                                                    ->first();
                                                // dd($C_name);
                                            @endphp
                                            <span class="fw-bold"> {{ @$C_name->name }},</span>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Collection Type:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->collectionType->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Style:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->style->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Subject:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->subject->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Literature:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold"><?php echo html_entity_decode($artwork->literature); ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        About this work:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold"><?php echo html_entity_decode($artwork->about_the_work); ?></span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Artwork type:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ $artwork->artwork_type }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Auction Starting Price:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->auction_starting_price }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Auction Reserve Price:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->auction_reserve_price }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Auction Starting Date:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->auction_start_date }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Auction End Price:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->auction_end_date }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Rent Price/month:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->rent_price_per_one_month }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Rent Price/3-month:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->rent_price_per_three_month }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Rent Price/6-month:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->rent_price_per_six_month }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Rent Price/year:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->rent_price_per_year }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        Rent Discount Percentage:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->rent_discount_percentage }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Direct Sale Discount Percentage:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->direct_sale_discount_percentage }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Discount Start Date:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->discount_start_dt }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Discount End Date:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->discount_end_dt }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Material:
                                    </div>
                                    <div class="col-md-6">
                                        <span
                                            class="fw-bold">{{ $artwork->material_id == 0 ? $artwork->material_other : @$artwork->material->name }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Width:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->width }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Height:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->height }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Depth:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->depth }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        Art Price:
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-bold">{{ @$artwork->price }}</span>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                  <div class="col-md-6">
                                    Movement:
                                  </div>
                                  <div class="col-md-6">
                                      <span class="fw-bold">{{ @$artwork->movement->name }}</span>
                                  </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-md-6">
                                  Markings:
                                </div>
                                <div class="col-md-6">
                                    <span class="fw-bold">{{ @$artwork->markings }}</span>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                              <div class="col-md-6">
                                Exhibitions:
                              </div>
                              <div class="col-md-6">
                                  <span class="fw-bold">{{ @$artwork->exhibitions }}</span>
                              </div>
                          </div>
                          <hr>

                          <div class="row">
                            <div class="col-md-6">
                              Prints Available:
                            </div>
                            <div class="col-md-6">
                                <span class="fw-bold"><?php echo html_entity_decode($artwork->prints_available); ?></span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                          <div class="col-md-6">
                            Also Available Conditions:
                          </div>
                          <div class="col-md-6">
                              <span class="fw-bold"><?php echo html_entity_decode($artwork->also_available_condition); ?></span>
                          </div>
                      </div>
                      <hr>

                      <div class="row">
                        <div class="col-md-6">
                          Copyright:
                        </div>
                        <div class="col-md-6">
                            <span class="fw-bold"><?php echo html_entity_decode($artwork->copyright); ?></span>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-md-6">
                        Ready to hang:
                      </div>
                      <div class="col-md-6">
                          <span class="fw-bold">{{ $artwork->ready_to_hang}}</span>
                      </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      Signed by:
                    </div>
                    <div class="col-md-6">
                        <span class="fw-bold">{{ $artwork->signed_by }}</span>
                    </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-6">
                    Certification:
                  </div>
                  <div class="col-md-6">
                    @if (isset($artwork->certification) && !empty($artwork->certification ))
                        <a href="{{ asset('storage/CertificateDoc/'. $artwork->certification) }}"></a>
                    @else
                        
                    @endif
                      <span class="fw-bold">No Certification</span>
                  </div>
              </div>
              <hr>
                        


                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>


    @endsection

    @section('slideImage')

    @endsection
