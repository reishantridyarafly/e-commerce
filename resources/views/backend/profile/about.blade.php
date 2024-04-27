<div id="aboutme" class="tab-pane active">
    <div class="profile-desk">
        <h5 class="text-uppercase fs-17 text-dark">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
        </h5>
        <div class="designation mb-4">{{ auth()->user()->bio ? auth()->user()->bio : '' }}</div>

        <h5 class="mt-4 fs-17 text-dark">Informasi</h5>
        <table class="table table-condensed mb-0 border-top">
            <tbody>
                <tr>
                    <th scope="row">Email</th>
                    <td class="ng-binding">
                        {{ auth()->user()->email }}
                    </td>
                </tr>

                <tr>
                    <th scope="row">Phone</th>
                    <td class="ng-binding">{{ auth()->user()->no_telepon }}</td>
                </tr>
                <tr>
                    <th scope="row">Address</th>
                    <td class="ng-binding">WKwkwkwkwk
                    </td>
                </tr>

            </tbody>
        </table>
    </div> <!-- end profile-desk -->
</div> <!-- about-me -->
