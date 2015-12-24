var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// submitlog table
submitlog_addTip=["",spacer+"This option allows all members of the group to add records to the 'PAD Submissions' table. A member who adds a record to the table becomes the 'owner' of that record."];

submitlog_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PAD Submissions' table."];
submitlog_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PAD Submissions' table."];
submitlog_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PAD Submissions' table."];
submitlog_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PAD Submissions' table."];

submitlog_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PAD Submissions' table."];
submitlog_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PAD Submissions' table."];
submitlog_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PAD Submissions' table."];
submitlog_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PAD Submissions' table, regardless of their owner."];

submitlog_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PAD Submissions' table."];
submitlog_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PAD Submissions' table."];
submitlog_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PAD Submissions' table."];
submitlog_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PAD Submissions' table."];

// paddata table
paddata_addTip=["",spacer+"This option allows all members of the group to add records to the 'Search PAD Data' table. A member who adds a record to the table becomes the 'owner' of that record."];

paddata_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Search PAD Data' table."];
paddata_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Search PAD Data' table."];
paddata_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Search PAD Data' table."];
paddata_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Search PAD Data' table."];

paddata_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Search PAD Data' table."];
paddata_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Search PAD Data' table."];
paddata_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Search PAD Data' table."];
paddata_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Search PAD Data' table, regardless of their owner."];

paddata_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Search PAD Data' table."];
paddata_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Search PAD Data' table."];
paddata_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Search PAD Data' table."];
paddata_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Search PAD Data' table."];

// customurls table
customurls_addTip=["",spacer+"This option allows all members of the group to add records to the 'Custom URLs' table. A member who adds a record to the table becomes the 'owner' of that record."];

customurls_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Custom URLs' table."];
customurls_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Custom URLs' table."];
customurls_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Custom URLs' table."];
customurls_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Custom URLs' table."];

customurls_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Custom URLs' table."];
customurls_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Custom URLs' table."];
customurls_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Custom URLs' table."];
customurls_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Custom URLs' table, regardless of their owner."];

customurls_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Custom URLs' table."];
customurls_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Custom URLs' table."];
customurls_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Custom URLs' table."];
customurls_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Custom URLs' table."];

// bannerlist table
bannerlist_addTip=["",spacer+"This option allows all members of the group to add records to the 'Banners' table. A member who adds a record to the table becomes the 'owner' of that record."];

bannerlist_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Banners' table."];
bannerlist_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Banners' table."];
bannerlist_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Banners' table."];
bannerlist_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Banners' table."];

bannerlist_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Banners' table."];
bannerlist_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Banners' table."];
bannerlist_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Banners' table."];
bannerlist_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Banners' table, regardless of their owner."];

bannerlist_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Banners' table."];
bannerlist_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Banners' table."];
bannerlist_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Banners' table."];
bannerlist_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Banners' table."];

// blacklist table
blacklist_addTip=["",spacer+"This option allows all members of the group to add records to the 'Black List' table. A member who adds a record to the table becomes the 'owner' of that record."];

blacklist_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Black List' table."];
blacklist_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Black List' table."];
blacklist_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Black List' table."];
blacklist_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Black List' table."];

blacklist_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Black List' table."];
blacklist_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Black List' table."];
blacklist_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Black List' table."];
blacklist_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Black List' table, regardless of their owner."];

blacklist_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Black List' table."];
blacklist_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Black List' table."];
blacklist_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Black List' table."];
blacklist_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Black List' table."];

// usrreviews table
usrreviews_addTip=["",spacer+"This option allows all members of the group to add records to the 'User Reviews' table. A member who adds a record to the table becomes the 'owner' of that record."];

usrreviews_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'User Reviews' table."];
usrreviews_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'User Reviews' table."];
usrreviews_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'User Reviews' table."];
usrreviews_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'User Reviews' table."];

usrreviews_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'User Reviews' table."];
usrreviews_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'User Reviews' table."];
usrreviews_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'User Reviews' table."];
usrreviews_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'User Reviews' table, regardless of their owner."];

usrreviews_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'User Reviews' table."];
usrreviews_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'User Reviews' table."];
usrreviews_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'User Reviews' table."];
usrreviews_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'User Reviews' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
