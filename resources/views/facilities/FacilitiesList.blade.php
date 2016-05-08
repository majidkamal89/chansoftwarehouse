 @if(count($facilityData) > 0)
          	@foreach($facilityData as $allData)
<tr>
  <td>{{ $allData->FacilityName }}</td>
  <td>{{ $allData->FacilityAddress }}, {{ $allData->FacilityCity }} {{ $allData->FacilityState }} {{ $allData	->FacilityZip }}</td>
  <td>{{ $allData->FacilityType == 1 ? 'SNF' : 'ALF' }}</td>
  <td>{{ $allData->FacilityCounty }}</td>
  <td>{{ $allData->FacilityNumberOfContacts }}</td>
  <td>{{ $allData->FacilityParticipateMedicare == 1 ? 'Yes' : 'No' }}</td>
</tr>
@endforeach
@else
<tr>
  <td colspan="100%"><strong>No Record Found</strong></td>
</tr>
@endif