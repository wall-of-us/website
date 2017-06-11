
@if (Auth::check())
  <ol>

<li>We have joined forces with other organizations to build a map of local immigration advocacy groups. If you know about a local group that serves immigrants add it to <a href="https://ragtag.org/wall-of-us/map" target="_blank">this map</a>.

@if ($state == "CA") 
 
<li>Support the California Values Act, which has passed the California Senate, by calling your <a href="http://findyourrep.legislature.ca.gov/" target="_blank">California Assemblymember</a>. Use this script:<br><br>
 
“Hello, my name is {{ Auth::user()->name }} and I live in 
@if(Auth::user()->city != "")
{{ Auth::user()->city }}
@else
_________.
@endif 
I would like ask Assemblymember _________ to vote YES on the California Values Act, SB 54. The bill will ensure that state and local resources are not
used to further mass deportations and separate families. The California Values Act will uphold
our core principles of equal treatment, community, and compassion. Say NO to Trump’s mass
deportation programs, please vote YES on SB 54. Thank you."

@endif
 
<li>Take action to stand with refugees by texting “STAND” to 313131 to get reminders to contact your rep and make sure they know you support the welcoming of refugees.
</ol>

    @else
    <ol>
      <li>We have joined forces with other organizations to build a map of local immigration advocacy groups. If you know about a local group that serves immigrants add it to <a href="https://ragtag.org/wall-of-us/map" target="_blank">this map</a>.
      <li>Take action to stand with refugees by texting “STAND” to 313131 to get reminders to contact your rep and make sure they know you support the welcoming of refugees.
      </ol>
  @endif
  
