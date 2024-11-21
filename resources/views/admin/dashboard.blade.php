@extends('admin.layout.template')

@section('sidebar')
    @include('admin.layout.sidebar.admin')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                <div class="card-body p-3 position-relative">
                <div class="row">
                    <div class="col-8 text-start">
                    <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                        <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    <h5 class="text-white font-weight-bolder mb-0 mt-3">
                        1600
                    </h5>
                    <span class="text-white text-sm">Users Active</span>
                    </div>
                    <div class="col-4">
                    <div class="dropdown text-end mb-6">
                        <a href="javascript:;" class="cursor-pointer" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-h text-white"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers1">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                    <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">+55%</p>
                    </div>
                </div>
                </div>
            </div>

                <div class="card">
                    <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                    <div class="card-body p-3 position-relative">
                        <div class="row">
                        <div class="col-8 text-start">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                            <i class="ni ni-active-40 text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                            357
                            </h5>
                            <span class="text-white text-sm">Click Events</span>
                        </div>
                        <div class="col-4">
                            <div class="dropstart text-end mb-6">
                            <a href="javascript:;" class="cursor-pointer" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h text-white"></i>
                            </a>
                            <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers2">
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                            </ul>
                            </div>
                            <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">+124%</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                    <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-2.jpg') }}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">John Michael</h6>
                            <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-3.jpg') }}" class="avatar avatar-sm me-3" alt="user2">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Alexa Liras</h6>
                            <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Programator</p>
                        <p class="text-xs text-secondary mb-0">Developer</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-4.jpg') }}" class="avatar avatar-sm me-3" alt="user3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                            <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Executive</p>
                        <p class="text-xs text-secondary mb-0">Projects</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-3.jpg') }}" class="avatar avatar-sm me-3" alt="user4">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Michael Levi</h6>
                            <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Programator</p>
                        <p class="text-xs text-secondary mb-0">Developer</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-2.jpg') }}" class="avatar avatar-sm me-3" alt="user5">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Richard Gran</h6>
                            <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                        <p class="text-xs text-secondary mb-0">Executive</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('admin/img/team-4.jpg') }}" class="avatar avatar-sm me-3" alt="user6">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Miriam Eric</h6>
                            <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Programtor</p>
                        <p class="text-xs text-secondary mb-0">Developer</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                    </td>
                    <td class="align-middle">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                        </a>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h6>Projects table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                <thead>
                    <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Spotify</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$2,500</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">working</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">60%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-invision.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="invision">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Invision</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$5,000</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">done</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">100%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-jira.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="jira">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Jira</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$3,400</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">canceled</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">30%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="width: 30%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-slack.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="slack">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Slack</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$1,000</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">canceled</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">0%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-webdev.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="webdev">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Webdev</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$14,000</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">working</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">80%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 80%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="d-flex px-2">
                        <div>
                            <img src="{{ asset('admin/img/small-logos/logo-xd.svg') }}" class="avatar avatar-sm rounded-circle me-2" alt="xd">
                        </div>
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">Adobe XD</h6>
                        </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-sm font-weight-bold mb-0">$2,300</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">done</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">100%</span>
                        <div>
                            <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                        </button>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
