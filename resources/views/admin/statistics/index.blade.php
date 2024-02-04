@extends('admin.layouts.layout')
@section('title')
    Statistics
@endsection

@section('content')
    <ol class="breadcrumb text-muted fs-6 fw-semibold mb-6">
        <li class="breadcrumb-item text-muted">Statistics</li>
    </ol>

    <div class="table-site">
        <div class="d-block d-md-flex flex-stack mb-3">
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-2 position-absolute me-3 end-0"><span
                        class="path1"></span><span class="path2"></span></i>
                <input type="text"
                       class="search-table form-control form-control-solid w-md-250px ps-15"
                       placeholder="Search"/>
            </div>
        </div>
        <div id="kt_datatable_example_1_export" class="d-none"></div>
        <!--end::Search-->
        <table id="datatable_configuration" class="table table-row-bordered gy-5">
            <thead>
            <tr class="fw-semibold fs-6 text-muted">
                <th class='text-start'>User Name</th>
                <th class='text-start'>Number Of Tasks</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <!--end::App-->
@endsection


@section('script')
    <script src="{{ asset('admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        // Class definition
        var KTDatatablesExample = function () {
            var table;
            var tableB;
            var dt;
            var initDatatable = function () {
                dt = $("#datatable_configuration").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,

                    ajax: {
                        url: "{{ route('admin.statistics.data') }}",
                        type: "GET",
                        data: function (d) {
                            return d;
                        }
                    },

                    columns: [

                        {
                            "data": "user_name",
                            orderable: false,
                            searchable: false
                        },
                        {
                            "data": "num_of_tasks"
                        }
                    ],

                    order: [],
                    // order: [[13, 'asc']],
                    stateSave: true,
                    language: {
                        "emptyTable": "No data available in the table",
                        "zeroRecords": "No matching records found",
                        url: "{{ asset('admin/js/en.json') }}",
                    },
                    drawCallback: function (settings) {
                        var api = this.api();
                        var totalRows = api.ajax.json().recordsFiltered; //Get total rows of data
                        var rowPerPage = api.rows({
                            page: 'current'
                        }).data().length; //Get total rows of data per page

                        if (totalRows > rowPerPage) {
                            //Show pagination and "Show X Entries" drop down option
                            $('div.dataTables_paginate')[0].style.display = "block";
                            $('div.dataTables_length')[0].style.display = "block";
                            $('div.dataTables_info')[0].style.display = "block";
                        } else {
                            //Hide it
                            $('div.dataTables_paginate')[0].style.display = "none";
                            $('div.dataTables_length')[0].style.display = "none";
                            $('div.dataTables_info')[0].style.display = "none";
                        }
                    },
                    // responsive: true
                });

                table = dt.$;
                dt.on('draw', function () {
                    KTMenu.createInstances();
                });
            }

            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('.search-table');
                filterSearch.addEventListener('keyup', function (e) {
                    dt.search(e.target.value).draw();
                });
            }

            return {
                init: function () {
                    tableB = document.querySelector('#datatable_configuration');

                    if (!tableB) {
                        return;
                    }
                    initDatatable();
                    handleSearchDatatable();

                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesExample.init();
        });
    </script>
@endsection
