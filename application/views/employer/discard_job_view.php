<h2>Discard job</h2>
<p>Are you sure to discard the job "<?php echo $job['Name'].'" (ID: '.$job['JID'].')'; ?>?</p>
<p>Note: All "Invitations" and "Applications" relating to this job will be discarded, this cannot be undone!</p>
<?php
echo anchor('employer/job/discard_confirmed/'.$job['JID'], 'Discard');
echo anchor('employer/managejobs', 'Cancel');
?>
