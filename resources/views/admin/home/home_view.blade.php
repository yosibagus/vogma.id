@extends('admin.template.template')

@section('content_admin')
    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-primary me-md-4 me-3">
                                    <!-- Icon baru: User Group -->
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#007bff"
                                            d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                                    </svg>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-1">Total Penyelenggara</p>
                                    <h4 class="mb-0 text-black font-w600">{{ $total_penyelenggara }}</h4>
                                </div>
                            </div>
                            <div class="progress mt-3" style="height:5px;">
                                <div class="progress-bar bg-primary"
                                    style="width: {{ $persentase_penyelenggara }}%; height:5px;" aria-label="Progress"
                                    role="progressbar">
                                    <span class="sr-only">{{ $persentase_penyelenggara }}% complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-primary"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-secondary  me-md-4 me-3">
                                    <svg width="32" height="31" viewBox="0 0 32 31" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 30.5H22.75C23.7442 30.4989 24.6974 30.1035 25.4004 29.4004C26.1035 28.6974 26.4989 27.7442 26.5 26.75V16.75C26.5 16.4185 26.3683 16.1005 26.1339 15.8661C25.8995 15.6317 25.5815 15.5 25.25 15.5C24.9185 15.5 24.6005 15.6317 24.3661 15.8661C24.1317 16.1005 24 16.4185 24 16.75V26.75C23.9997 27.0814 23.8679 27.3992 23.6336 27.6336C23.3992 27.8679 23.0814 27.9997 22.75 28H4C3.66857 27.9997 3.3508 27.8679 3.11645 27.6336C2.88209 27.3992 2.7503 27.0814 2.75 26.75V9.25C2.7503 8.91857 2.88209 8.6008 3.11645 8.36645C3.3508 8.13209 3.66857 8.0003 4 8H15.25C15.5815 8 15.8995 7.8683 16.1339 7.63388C16.3683 7.39946 16.5 7.08152 16.5 6.75C16.5 6.41848 16.3683 6.10054 16.1339 5.86612C15.8995 5.6317 15.5815 5.5 15.25 5.5H4C3.00577 5.50109 2.05258 5.89653 1.34956 6.59956C0.646531 7.30258 0.251092 8.25577 0.25 9.25V26.75C0.251092 27.7442 0.646531 28.6974 1.34956 29.4004C2.05258 30.1035 3.00577 30.4989 4 30.5Z"
                                            fill="#EA4989"></path>
                                        <path
                                            d="M25.25 0.5C24.0138 0.5 22.8055 0.866556 21.7777 1.55331C20.7498 2.24007 19.9488 3.21619 19.4757 4.35823C19.0027 5.50027 18.8789 6.75693 19.1201 7.96931C19.3612 9.1817 19.9565 10.2953 20.8306 11.1694C21.7046 12.0435 22.8183 12.6388 24.0307 12.8799C25.243 13.1211 26.4997 12.9973 27.6417 12.5242C28.7838 12.0512 29.7599 11.2501 30.4466 10.2223C31.1334 9.19451 31.5 7.98613 31.5 6.75C31.498 5.093 30.8389 3.50442 29.6672 2.33274C28.4955 1.16106 26.907 0.501952 25.25 0.5ZM25.25 10.5C24.5083 10.5 23.7833 10.2801 23.1666 9.86801C22.5499 9.45596 22.0692 8.87029 21.7854 8.18506C21.5016 7.49984 21.4273 6.74584 21.572 6.01841C21.7167 5.29098 22.0739 4.6228 22.5983 4.09835C23.1228 3.5739 23.7909 3.21675 24.5184 3.07206C25.2458 2.92736 25.9998 3.00162 26.685 3.28545C27.3702 3.56928 27.9559 4.04993 28.368 4.66661C28.78 5.2833 29 6.00832 29 6.75C28.9989 7.74423 28.6034 8.69742 27.9004 9.40044C27.1974 10.1035 26.2442 10.4989 25.25 10.5Z"
                                            fill="#EA4989"></path>
                                        <path
                                            d="M6.5 13H12.75C13.0815 13 13.3995 12.8683 13.6339 12.6339C13.8683 12.3995 14 12.0815 14 11.75C14 11.4185 13.8683 11.1005 13.6339 10.8661C13.3995 10.6317 13.0815 10.5 12.75 10.5H6.5C6.16848 10.5 5.85054 10.6317 5.61612 10.8661C5.3817 11.1005 5.25 11.4185 5.25 11.75C5.25 12.0815 5.3817 12.3995 5.61612 12.6339C5.85054 12.8683 6.16848 13 6.5 13Z"
                                            fill="#EA4989"></path>
                                        <path
                                            d="M5.25 16.75C5.25 17.0815 5.3817 17.3995 5.61612 17.6339C5.85054 17.8683 6.16848 18 6.5 18H17.75C18.0815 18 18.3995 17.8683 18.6339 17.6339C18.8683 17.3995 19 17.0815 19 16.75C19 16.4185 18.8683 16.1005 18.6339 15.8661C18.3995 15.6317 18.0815 15.5 17.75 15.5H6.5C6.16848 15.5 5.85054 15.6317 5.61612 15.8661C5.3817 16.1005 5.25 16.4185 5.25 16.75Z"
                                            fill="#EA4989"></path>
                                    </svg>

                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Event</p>
                                    <span class="title text-black font-w600">{{ $total_event }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-secondary" style="width:{{ $persentase_event }}%; height:5px;"
                                    aria-label="Progess-secondary" role="progressbar">
                                    <span class="sr-only">{{ $persentase_event }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-secondary"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-danger me-md-4 me-3">
                                    <svg width="39" height="74" viewBox="0 0 39 74" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.5325 18.9448C27.7921 15.402 23.5761 13.6 18.0001 13.6C12.4241 13.6 8.2081 15.402 5.4677 18.9448C0.082099 25.908 2.8701 36.9376 2.9925 37.4C3.34508 38.8603 4.81456 39.7583 6.27486 39.4057C7.71986 39.0568 8.61712 37.6123 8.2897 36.1624C8.2897 36.0808 6.6985 27.8596 10.3297 23.3988L10.5269 23.1676V36.6588L9.1669 65.1508C9.0921 66.6164 10.1934 67.8771 11.6557 68H11.8801C13.2659 68.0095 14.4372 66.9758 14.6001 65.5996L17.5309 40.8H18.4625L21.4001 65.5996C21.563 66.9758 22.7343 68.0095 24.1201 68H24.3513C25.8136 67.8771 26.9149 66.6164 26.8401 65.1508L25.4801 36.6588V23.1744L25.6637 23.392C29.3357 27.88 27.7037 36.074 27.7037 36.176C27.3657 37.6407 28.279 39.1021 29.7437 39.44C31.2084 39.778 32.6697 38.8647 33.0077 37.4C33.1301 36.9376 35.9181 25.908 30.5325 18.9448Z"
                                            fill="#D8D8D8"></path>
                                        <path
                                            d="M18.0001 12.24C21.3801 12.24 24.1201 9.49998 24.1201 6.12C24.1201 2.74002 21.3801 0 18.0001 0C14.6201 0 11.8801 2.74002 11.8801 6.12C11.8801 9.49998 14.6201 12.24 18.0001 12.24Z"
                                            fill="#D8D8D8"></path>
                                        <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="19" width="39"
                                            height="55">
                                            <path
                                                d="M0 26.0017C0 24.1758 1.37483 22.6428 3.18995 22.4448L3.26935 22.4361C4.23614 22.3306 5.1115 21.8163 5.67413 21.023L6.13877 20.3679C7.48483 18.4701 10.3941 18.7986 11.2832 20.9487L11.4217 21.2836C12.2534 23.2951 14.9783 23.5955 16.2283 21.8136C17.323 20.253 19.6329 20.247 20.7357 21.8019L21.5961 23.0149C22.4113 24.1642 23.7948 24.7693 25.1921 24.5877L28.4801 24.1603C34.0567 23.4354 39 27.7777 39 33.4012V54.5C39 65.2695 30.2696 74 19.5 74C8.73045 74 0 65.2696 0 54.5V26.0017Z"
                                                fill="#C4C4C4"></path>
                                        </mask>
                                        <g mask="url(#mask0)">
                                            <path
                                                d="M30.5324 18.9448C27.792 15.402 23.576 13.6 18 13.6C12.424 13.6 8.20798 15.402 5.46758 18.9448C0.0819769 25.908 2.86998 36.9376 2.99238 37.4C3.34496 38.8603 4.81444 39.7583 6.27474 39.4057C7.71974 39.0568 8.617 37.6123 8.28958 36.1624C8.28958 36.0808 6.69838 27.8596 10.3296 23.3988L10.5268 23.1676V36.6588L9.16678 65.1508C9.09198 66.6164 10.1932 67.8771 11.6556 68H11.88C13.2658 68.0095 14.4371 66.9758 14.6 65.5996L17.5308 40.8H18.4624L21.4 65.5996C21.5628 66.9758 22.7341 68.0095 24.12 68H24.3512C25.8135 67.8771 26.9148 66.6164 26.84 65.1508L25.48 36.6588V23.1744L25.6636 23.392C29.3356 27.88 27.7036 36.074 27.7036 36.176C27.3656 37.6407 28.2789 39.1021 29.7436 39.44C31.2083 39.778 32.6696 38.8647 33.0076 37.4C33.13 36.9376 35.918 25.908 30.5324 18.9448Z"
                                                fill="#0B2A97"></path>
                                            <path
                                                d="M17.9999 12.24C21.3799 12.24 24.12 9.49998 24.12 6.12C24.12 2.74002 21.3799 0 17.9999 0C14.62 0 11.8799 2.74002 11.8799 6.12C11.8799 9.49998 14.62 12.24 17.9999 12.24Z"
                                                fill="#0B2A97"></path>
                                        </g>
                                    </svg>

                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Finalis</p>
                                    <span class="title text-black font-w600">{{ $total_kandidat }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-danger" style="width: {{ $persentase_kandidat }}%; height:5px;"
                                    aria-label="Progess-danger" role="progressbar">
                                    <span class="sr-only">{{ $persentase_kandidat }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-danger"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-warning  me-md-4 me-3">
                                    <svg width="20" height="36" viewBox="0 0 20 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.08 24.36C19.08 25.64 18.76 26.8667 18.12 28.04C17.48 29.1867 16.5333 30.1467 15.28 30.92C14.0533 31.6933 12.5733 32.1333 10.84 32.24V35.48H8.68V32.24C6.25333 32.0267 4.28 31.2533 2.76 29.92C1.24 28.56 0.466667 26.84 0.44 24.76H4.32C4.42667 25.88 4.84 26.8533 5.56 27.68C6.30667 28.5067 7.34667 29.0267 8.68 29.24V19.24C6.89333 18.7867 5.45333 18.32 4.36 17.84C3.26667 17.36 2.33333 16.6133 1.56 15.6C0.786667 14.5867 0.4 13.2267 0.4 11.52C0.4 9.36 1.14667 7.57333 2.64 6.16C4.16 4.74666 6.17333 3.96 8.68 3.8V0.479998H10.84V3.8C13.1067 3.98667 14.9333 4.72 16.32 6C17.7067 7.25333 18.5067 8.89333 18.72 10.92H14.84C14.7067 9.98667 14.2933 9.14667 13.6 8.4C12.9067 7.62667 11.9867 7.12 10.84 6.88V16.64C12.6 17.0933 14.0267 17.56 15.12 18.04C16.24 18.4933 17.1733 19.2267 17.92 20.24C18.6933 21.2533 19.08 22.6267 19.08 24.36ZM4.12 11.32C4.12 12.6267 4.50667 13.6267 5.28 14.32C6.05333 15.0133 7.18667 15.5867 8.68 16.04V6.8C7.29333 6.93333 6.18667 7.38667 5.36 8.16C4.53333 8.90667 4.12 9.96 4.12 11.32ZM10.84 29.28C12.28 29.12 13.4 28.6 14.2 27.72C15.0267 26.84 15.44 25.7867 15.44 24.56C15.44 23.2533 15.04 22.2533 14.24 21.56C13.44 20.84 12.3067 20.2667 10.84 19.84V29.28Z"
                                            fill="#EA4989" />
                                    </svg>

                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Pendapatan</p>
                                    <span class="title text-black font-w600">{{ rupiah($total_pembayaran) }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-warning"
                                    style="width: {{ $persentase_pendapatan }}%; height:5px;" role="progressbar"
                                    aria-valuenow="{{ $persentase_pendapatan }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">{{ round($persentase_pendapatan) }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-warning"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-6 col-xxl-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block pb-0 border-0">
                    <div class="me-auto pe-3 mb-sm-0 mb-3">
                        <h4 class="text-black fs-20">Plan List</h4>
                        <p class="fs-13 mb-0">Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                    <div class="dropdown mb-3 show">
                        <button type="button" class="btn rounded btn-primary light" data-bs-toggle="dropdown"
                            aria-expanded="true">
                            <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip5)">
                                    <path
                                        d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219823 18.4993C0.133362 19.0815 0.644694 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.00091 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71475 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z"
                                        fill="#A02CFA" />
                                    <path
                                        d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z"
                                        fill="#A02CFA" />
                                    <path
                                        d="M13.0179 3.15677C12.7369 2.86819 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43727L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z"
                                        fill="#A02CFA" />
                                </g>
                                <defs>
                                    <clipPath id="clip5">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            Running
                            <svg class="ms-2" width="14" height="8" viewBox="0 0 14 8" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 0.999999L7 7L13 1" stroke="#0B2A97" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div id="chartBar"></div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-9 col-xxl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block pb-0 border-0">
                            <div class="me-auto pe-3">
                                <h4 class="text-black font-w600 fs-20">Recomended Finalis</h4>
                                {{-- <p class="fs-13 mb-0">Lorem ipsum dolor sit amet, consectetur</p> --}}
                            </div>
                            {{-- <a href="food-menu.html" class="btn btn-primary rounded d-none d-md-block">View More</a> --}}
                        </div>
                        <div class="card-body pt-2">
                            <div class="testimonial-one owl-carousel">
                                @foreach ($event_kandidat as $kandidat)
                                    <div class="items">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <img src="{{ asset($kandidat->foto_kandidat) }}" alt="">
                                                {{-- Ganti jika ada foto --}}
                                                <h5 class="fs-16 font-w500 mb-1 text-black">
                                                    {{ $kandidat->nama_kandidat ?? 'Tanpa Nama' }}
                                                </h5>
                                                <p class="fs-14">
                                                    {{ $kandidat->event->nama_event ?? 'Tidak ada event' }}
                                                </p>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="..." fill="#FFAA29" /> {{-- SVG bintang --}}
                                                    </svg>
                                                    <span
                                                        class="fs-14 d-block ms-2 pe-2 me-2 border-end text-black font-w500">
                                                        {{ $kandidat->rating ?? '4.5' }} {{-- Ganti jika punya rating --}}
                                                    </span>
                                                    <a href="#" class="btn-link fs-14">Voters</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block pb-0 border-0">
                            <div class="me-auto pe-3">
                                <h4 class="text-black fs-20 font-w600">Calories Chart</h4>
                            </div>
                            <select class="default-select w-auto" aria-label="Default select example">
                                <option selected>Weekly</option>
                                <option value="1">Monthly</option>
                                <option value="2">Daily</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div>
                        <div class="card-body px-3 pb-0">
                            <div id="chartTimeline"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card featuredMenu">
                        <div class="card-header border-0">
                            <h4 class="text-black font-w600 fs-20 mb-0">Event Terbaru</h4>
                        </div>
                        <div class="card-body loadmore-content height700 dz-scroll pt-0" id="FeaturedMenusContent">
                            @foreach ($event_terbaru as $event)
                                <div class="media mb-4">
                                    <img src="{{ asset($event->benner_event) }}" width="85"
                                        alt="banner" class="rounded me-3">
                                    <div class="media-body">
                                        <h5>
                                            <p  class="text-black fs-16">
                                                {{ $event->nama_event }}
                                            </p>
                                        </h5>
                                    </div>
                                </div>
                                <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                    <li class="me-3 mb-2">
                                        <i class="las la-clock scale5 me-2"></i>
                                        <span class="fs-14 text-black">
                                            {{ \Carbon\Carbon::parse($event->tgl_start_event)->format('d M Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($event->tgl_end_event)->format('d M Y') }}
                                        </span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa-solid fa-location-dot me-2 scale1 text-info"></i>
                                        <span class="fs-14 text-black font-w500">{{ $event->lokasi_event }}</span>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="card-footer style-1 text-center border-0 pt-0 pb-4">
                            <a class="text-primary dz-load-more fa fa-chevron-down" aria-label="Featured-icon"
                                id="FeaturedMenus" href="javascript:void(0);" rel="ajax/featured-menu-list.html">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
