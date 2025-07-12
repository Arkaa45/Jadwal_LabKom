<?php
$ci =& get_instance();
$ci->load->library('session');
$ci->load->database();

// Get user data from database using user_id from session
$user_id = $ci->session->userdata('user_id');
$profile_name = '';
$profile_pict = '';

if ($user_id) {
    $ci->db->select('username, profilepict');
    $ci->db->from('users');
    $ci->db->where('id', $user_id);
    $user = $ci->db->get()->row();
    
    if ($user) {
        $profile_name = $user->username ?: $ci->session->userdata('email');
        $profile_pict = $user->profilepict;
    }
}

// Fallback to session data if database query fails
if (empty($profile_name)) {
    $profile_name = $ci->session->userdata('username') ?: $ci->session->userdata('email');
}
if (empty($profile_pict)) {
    $profile_pict = $ci->session->userdata('profilepict');
}
?>
<div style="background:#283593;color:#fff;padding:6px 14px;display:flex;align-items:center;justify-content:space-between;min-height:38px;">
    <div style="font-size:16px;font-weight:bold;letter-spacing:1px;display:flex;align-items:center;">
        <span style="margin-right:10px;"><i class="fa fa-flask"></i></span> Laboratorium FTI
    </div>
    <div style="display:flex;align-items:center;gap:8px;">
        <?php if (!empty($profile_pict)): ?>
            <img src="<?php echo base_url($profile_pict); ?>" alt="Profile" style="width:26px;height:26px;border-radius:50%;object-fit:cover;">
        <?php else: ?>
            <img src="<?php echo base_url('assets/img/account.png'); ?>" alt="Profile" style="width:26px;height:26px;border-radius:50%;object-fit:cover;">
        <?php endif; ?>
        <span style="font-weight:500;letter-spacing:0.5px;font-size:14px;"> <?php echo htmlspecialchars($profile_name); ?> </span>
    </div>
</div> 
