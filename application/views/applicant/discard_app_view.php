<h2>Discard Application</h2>
<?php
  echo '<p>Are you sure to discard the application for the job "'.$app['Job_Name'].'" of employer "'.$app['Employer_Name'].'" with the CV "'.$app['Subject'].'" ?</p>';

  echo anchor('applicant/applications/discard_confirmed/'.$app['CID'].'/'.$app['JID'], 'Discard');
  echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
  echo anchor('applicant/applications', 'Cancel');
