@section('content')
        <table class="table table-striped margin_top">
            <colgroup><col>
                <col>

            </colgroup><tbody>
               <?php /*  <tr>
                    <td><strong>Admission Sponsor</strong></td>
                    <td>{{{ isset($data['Admission Sponsor']) ? $data['Admission Sponsor'] : '' }}}</td>
                </tr>
                <tr>
                   <td><strong>Sponsor</strong></td>
                   <td>{{{ isset($data['Sponsor']) ? $data['Sponsor'] : '' }}}</td>
                </tr> */?>
                <tr>
                    <td><strong>Date of Change</strong></td>
                    <td>{{{ isset($data['Date of change']) ? $data['Date of change'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{{ isset($data['Name']) ? $data['Name'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Age</strong></td>
                    <td>{{{ isset($data['Age']) ? $data['Age'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Nationality</strong></td>
                    <td>{{{ isset($data['Nationality']) ? $data['Nationality'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Type of Change</strong></td>
                    <td>{{{ isset($data['Type of change']) ? $data['Type of change'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Designation</strong></td>
                    <td>{{{ isset($data['Designation']) ? $data['Designation'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Directorate</strong></td>
                    <td>{{{ isset($data['Directorate']) ? $data['Directorate'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Qualifications</strong></td>
                    <td>{{{ isset($data['Qualifications']) ? $data['Qualifications'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Working Experience and Occupation</strong></td>
                    <td>
                        {{{ isset($data['Working experience and occupation']) ? $data['Working experience and occupation'] : '' }}}
                    </td>
                </tr>
                <tr>
                    <td><strong>Directorship of Public Companies (if any)</strong></td>
                    <td>{{{ isset($data['Directorship of public companies (if any)']) ? $data['Directorship of public companies (if any)'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Family relationship with any director and/or major shareholder of the listed issuer</strong></td>
                    <td>{{{ isset($data['Family relationship with any director and/or major shareholder of the listed issuer']) ? $data['Family relationship with any director and/or major shareholder of the listed issuer'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Any conflict of interests that he/she has with the listed issuer</strong></td>
                    <td>{{{ isset($data['Any conflict of interests that he/she has with the listed issuer']) ? $data['Any conflict of interests that he/she has with the listed issuer'] : '' }}}</td>
                </tr>
                <tr>
                    <td><strong>Details of any interest in the securities of the listed issuer or its subsidiaries</strong></td>
                    <td>{{{ isset($data['Details of any interest in the securities of the listed issuer or its subsidiaries']) ? $data['Details of any interest in the securities of the listed issuer or its subsidiaries'] : '' }}}</td>
                </tr>
                
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table> 
        <p>Remarks: N/A.</p>
@stop
