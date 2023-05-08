<html lang="bn">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <style>
        @page {
            margin: 2rem;
        }

        .bold {
            font-weight: bold;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 18px;
            width: 70%;
        }

        .text-center {
            text-align: center;
        }

        th {
            border: 1px solid black;
            text-align: left;
            padding: .3rem;
            width: 40%;
            font-weight: normal;
            text-transform: uppercase;
        }



        tr {}

        td {
            border: 1px solid black;
            padding: 0.3rem;
            text-transform: uppercase;
            width: 60%;
        }


        .bn {
            font-family: solaimanlipi;
            font-weight: normal;
        }

        .my-2 {
            margin: 2rem 0;
        }

        .table-borderless {
            border: none;
        }

        .table-borderless td,
        .table-borderless th,
        .table-borderless tr {
            border: none;
        }

        .page-break {
            page-break-after: always;
        }

        #header {
            margin: .2rem;
        }
    </style>


</head>

<body>


    <div class="container-lg">
        <div class="row" id="table-responsive" style="margin: 0 auto">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-uppercase mb-0 text-center">Student Database</h2>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-bordered table">
                        <tr>
                            <th colspan="4" class="bold text-center">Personal Information</th>
                        </tr>
                        <tr>
                            <th class="w-25 bn">Student's Name</th>
                            <td colspan="3" class="">
                                {{ $applicant->full_name }}
                            </td>
                            <td rowspan="5">
                                <img src="" alt="" class="w-100" width="200" height="200"
                                    style="margin: 0 3rem">
                            </td>
                        </tr>

                        <tr>
                            <th class="w-25">
                                Roll:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>

                        <tr>
                            <th class="w-25">
                                Student ID:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                Birth Date:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                father's name:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                MOTHER's name:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                DEPARTMENT:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                SEMESTER:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                BLOOD:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                COUNTRY:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                LANGUAGE:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                PHONE:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                EMAIL:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                GENDER:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">
                                HOBBY:
                            </th>

                            <td colspan="3">
                                Roll
                            </td>
                        </tr>



                    </table>
                </div>


            </div>
        </div>
    </div>

</body>

</html>
