@extends('layouts.app')


@section('content')

<div class="col-lg-12">
    <div class="card">
        <!-- <div class="card-header">
            <h4>Custom Tab</h4>
        </div> -->
        <div class="card-body">
            <div class="custom-tab">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="custom-nav-project-tab" data-toggle="tab" href="#custom-nav-project" role="tab" aria-controls="custom-nav-project"
                         aria-selected="true"><i class="fab fa-product-hunt"></i>Project</a>
                        <a class="nav-item nav-link" id="custom-nav-task-tab" data-toggle="tab" href="#custom-nav-task" role="tab" aria-controls="custom-nav-task"
                         aria-selected="false"><i class="fas fa-tasks"></i>Tasks</a>
                        <a class="nav-item nav-link" id="custom-nav-xflow-tab" data-toggle="tab" href="#custom-nav-xflow" role="tab" aria-controls="custom-nav-xflow"
                         aria-selected="false"><i class="fas fa-cogs"></i>X-flow</a>
                        <a class="nav-item nav-link" id="custom-nav-checklist-tab" data-toggle="tab" href="#custom-nav-checklist" role="tab" aria-controls="custom-nav-checklist"
                         aria-selected="false"><i class="fas fa-map-signs"></i>Checklists</a>
                        <a class="nav-item nav-link" id="custom-nav-files-tab" data-toggle="tab" href="#custom-nav-files" role="tab" aria-controls="custom-nav-files"
                         aria-selected="false"><i class="fas fa-copy"></i>Files</a>
                        <a class="nav-item nav-link" id="custom-nav-users-tab" data-toggle="tab" href="#custom-nav-users" role="tab" aria-controls="custom-nav-users"
                         aria-selected="false"><i class="fas fa-users"></i>Users</a>
                        <a class="nav-item nav-link" id="custom-nav-attestation-tab" data-toggle="tab" href="#custom-nav-attestation" role="tab" aria-controls="custom-nav-attestation"
                         aria-selected="false"><i class="fas fa-file-text"></i>Forms</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="custom-nav-project" role="tabpanel" aria-labelledby="custom-nav-project-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-task" role="tabpanel" aria-labelledby="custom-nav-task-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-xflow" role="tabpanel" aria-labelledby="custom-nav-xflow-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-checklist" role="tabpanel" aria-labelledby="custom-nav-checklist-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-files" role="tabpanel" aria-labelledby="custom-nav-files-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-users" role="tabpanel" aria-labelledby="custom-nav-users-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="custom-nav-attestation" role="tabpanel" aria-labelledby="custom-nav-attestation-tab">
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection