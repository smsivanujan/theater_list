            <!-- app-Header -->
            <div class="app-header header sticky">
            	<div class="container-fluid main-container">
            		<div class="d-flex">
            			<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
            			<!-- sidebar-toggle-->
            			<a class="logo-horizontal " href="{{ route('index.dashboard') }}">
            				<img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
            				<img src="{{asset('assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
            			</a>
            			<!-- LOGO -->

            			<div class="d-flex order-lg-2 ms-auto header-right-icons">
            				<div class="dropdown d-xl-none d-md-block d-none">
            					<a href="#" class="nav-link icon" data-bs-toggle="dropdown">
            						<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            							<path fill="" d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z" />
            						</svg>
            					</a>
            					<div class="dropdown-menu header-search dropdown-menu-start">
            						<div class="input-group w-100 p-2">
            							<input type="text" class="form-control" placeholder="Search....">
            							<div class="input-group-text btn btn-primary">
            								<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            									<path d="M21.2529297,17.6464844l-2.8994141-2.8994141c-0.0021973-0.0021973-0.0043945-0.0043945-0.0065918-0.0065918c-0.8752441-0.8721313-2.2249146-0.9760132-3.2143555-0.3148804l-0.8467407-0.8467407c1.0981445-1.2668457,1.7143555-2.887146,1.715332-4.5747681c0.0021973-3.8643799-3.1286621-6.9989014-6.993042-7.0011597S2.0092773,5.1315308,2.007019,8.9959106S5.1356201,15.994812,9,15.9970703c1.6889038,0.0029907,3.3114014-0.6120605,4.5789185-1.7111206l0.84729,0.84729c-0.6630859,0.9924316-0.5566406,2.3459473,0.3208618,3.2202759l2.8994141,2.8994141c0.4780884,0.4786987,1.1271973,0.7471313,1.8037109,0.7460938c0.6766357,0.0001831,1.3256226-0.2686768,1.803894-0.7472534C22.2493286,20.2558594,22.2488403,18.6417236,21.2529297,17.6464844z M9.0084229,14.9970703c-3.3120728,0.0023193-5.9989624-2.6807861-6.0012817-5.9928589S5.6879272,3.005249,9,3.0029297c1.5910034-0.0026855,3.1175537,0.628479,4.2421875,1.7539062c1.1252441,1.1238403,1.7579956,2.6486206,1.7590942,4.2389526C15.0036011,12.3078613,12.3204956,14.994751,9.0084229,14.9970703z M20.5458984,20.5413818c-0.604126,0.6066284-1.5856934,0.6087036-2.1923828,0.0045166l-2.8994141-2.8994141c-0.2913818-0.2910156-0.4549561-0.6861572-0.4544678-1.0979614C15.0006714,15.6928101,15.6951294,15,16.5507812,15.0009766c0.4109497-0.0005493,0.8051758,0.1624756,1.0957031,0.453125l2.8994141,2.8994141C21.1482544,18.9584351,21.1482544,19.9364624,20.5458984,20.5413818z" />
            								</svg>
            							</div>
            						</div>
            					</div>
            				</div>
            				<!-- SEARCH -->

            				<button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            					<span class="navbar-toggler-icon fe fe-more-vertical"></span>
            				</button>

            				<div class="navbar navbar-collapse responsive-navbar p-0">
            					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            						<div class="d-flex order-lg-2">
            							<div class="dropdown  d-flex">
            								<a class="nav-link icon theme-layout nav-link-bg layout-setting">
            									<span class="dark-layout">
            										<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            											<path d="M22.0482178,13.2746582c-0.1265259-0.2453003-0.4279175-0.3416138-0.6732178-0.2150879C20.1774902,13.6793823,18.8483887,14.0019531,17.5,14c-0.8480835-0.0005493-1.6913452-0.1279297-2.50177-0.3779297c-4.4887085-1.3847046-7.0050049-6.1460571-5.6203003-10.6347656c0.0320435-0.1033325,0.0296021-0.2142944-0.0068359-0.3161621C9.2781372,2.411377,8.9921875,2.2761841,8.7324219,2.3691406C4.6903076,3.800293,1.9915771,7.626709,2,11.9146729C2.0109863,17.4956055,6.5440674,22.0109863,12.125,22c4.9342651,0.0131226,9.1534424-3.5461426,9.9716797-8.4121094C22.1149292,13.4810181,22.0979614,13.3710327,22.0482178,13.2746582z M16.0877075,20.0958252c-4.5321045,2.1853027-9.9776611,0.2828979-12.1630249-4.2492065S3.6417236,5.8689575,8.1738281,3.6835938C8.0586548,4.2776489,8.0004272,4.8814087,8,5.4865723C7.9962769,10.7369385,12.2495728,14.9962769,17.5,15c1.1619263,0.0023193,2.3140869-0.2119751,3.3974609-0.6318359C20.1879272,16.8778076,18.4368896,18.9630127,16.0877075,20.0958252z" />
            										</svg>
            									</span>
            									<span class="light-layout">
            										<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            											<path d="M6.3427734,16.9501953l-1.4140625,1.4140625c-0.09375,0.09375-0.1463623,0.2208862-0.1464233,0.3534546c0,0.276123,0.2238159,0.5,0.499939,0.500061c0.1326294,0.0001831,0.2598877-0.0525513,0.3535156-0.1464844l1.4140015-1.4140625c0.0024414-0.0023804,0.0047607-0.0047607,0.0071411-0.0071411c0.1932373-0.1971436,0.1900635-0.5137329-0.0071411-0.7069702C6.8526001,16.7498169,6.5360718,16.7529907,6.3427734,16.9501953z M6.3427734,7.0498047c0.0936279,0.0939331,0.2208862,0.1466675,0.3535156,0.1464844c0.1325684,0,0.2597046-0.0526733,0.3534546-0.1464233c0.1952515-0.1952515,0.1953125-0.5118408,0.000061-0.7070923L5.6356812,4.9287109c-0.1943359-0.1904907-0.5054321-0.1904907-0.6998291,0C4.7386475,5.1220093,4.7354736,5.4385376,4.9287109,5.6357422L6.3427734,7.0498047z M12,5h0.0006104C12.2765503,4.9998169,12.5001831,4.776001,12.5,4.5v-2C12.5,2.223877,12.276123,2,12,2s-0.5,0.223877-0.5,0.5v2.0006104C11.5001831,4.7765503,11.723999,5.0001831,12,5z M17.3037109,7.1962891c0.1326294,0.0001831,0.2598877-0.0525513,0.3535156-0.1464844l1.4140625-1.4141235c0.0023804-0.0023193,0.0047607-0.0046997,0.0070801-0.0070801c0.1932983-0.1972046,0.1900635-0.5137329-0.0070801-0.7070312c-0.1972046-0.1932373-0.5137329-0.1900635-0.7070312,0.0071411l-1.4140625,1.4140625c-0.09375,0.09375-0.1463623,0.2208862-0.1464233,0.3534546C16.803772,6.9723511,17.0275879,7.196228,17.3037109,7.1962891z M5,12c0-0.276123-0.223877-0.5-0.5-0.5h-2C2.223877,11.5,2,11.723877,2,12s0.223877,0.5,0.5,0.5h2C4.776123,12.5,5,12.276123,5,12z M17.6572266,16.9502563c-0.0023804-0.0023804-0.0046997-0.0047607-0.0070801-0.0070801c-0.1972046-0.1932983-0.5137329-0.1901245-0.7070312,0.0070801c-0.1932373,0.1971436-0.1901245,0.5136719,0.0070801,0.7069702l1.4140625,1.4140625c0.0936279,0.0939331,0.2208252,0.1466675,0.3534546,0.1464844c0.1325684,0,0.2597046-0.0526733,0.3534546-0.1463623c0.1953125-0.1952515,0.1953125-0.5118408,0.0001221-0.7070923L17.6572266,16.9502563z M12,19c-0.276123,0-0.5,0.223877-0.5,0.5v2.0005493C11.5001831,21.7765503,11.723999,22.0001831,12,22h0.0006104c0.2759399-0.0001831,0.4995728-0.223999,0.4993896-0.5v-2C12.5,19.223877,12.276123,19,12,19z M21.5,11.5h-2c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h2c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,11.5,21.5,11.5z M12,6.5c-3.0375366,0-5.5,2.4624634-5.5,5.5s2.4624634,5.5,5.5,5.5c3.0360107-0.0037842,5.4962158-2.4639893,5.5-5.5C17.5,8.9624634,15.0375366,6.5,12,6.5z M12,16.5c-2.4852905,0-4.5-2.0147095-4.5-4.5S9.5147095,7.5,12,7.5c2.4841309,0.0026855,4.4973145,2.0158691,4.5,4.5C16.5,14.4852905,14.4852905,16.5,12,16.5z" />
            										</svg>
            									</span>
            								</a>
            							</div>
            							<!-- Theme-Layout -->
            							<div class="dropdown d-md-flex">
            								<a class="nav-link icon full-screen-link nav-link-bg">
            									<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            										<path d="M8.5,21H3v-5.5C3,15.223877,2.776123,15,2.5,15S2,15.223877,2,15.5v6.0005493C2.0001831,21.7765503,2.223999,22.0001831,2.5,22h6C8.776123,22,9,21.776123,9,21.5S8.776123,21,8.5,21z M8.5,2H2.4993896C2.2234497,2.0001831,1.9998169,2.223999,2,2.5v6.0005493C2.0001831,8.7765503,2.223999,9.0001831,2.5,9h0.0006104C2.7765503,8.9998169,3.0001831,8.776001,3,8.5V3h5.5C8.776123,3,9,2.776123,9,2.5S8.776123,2,8.5,2z M21.5,15c-0.276123,0-0.5,0.223877-0.5,0.5V21h-5.5c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h6.0006104C21.7765503,21.9998169,22.0001831,21.776001,22,21.5v-6C22,15.223877,21.776123,15,21.5,15z M21.5,2h-6C15.223877,2,15,2.223877,15,2.5S15.223877,3,15.5,3H21v5.5005493C21.0001831,8.7765503,21.223999,9.0001831,21.5,9h0.0006104C21.7765503,8.9998169,22.0001831,8.776001,22,8.5V2.4993896C21.9998169,2.2234497,21.776001,1.9998169,21.5,2z" />
            									</svg>
            								</a>
            							</div>
            							<!-- FULL-SCREEN -->

            							<div class="dropdown d-md-flex profile-1">
            								<a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
            									<span>
            										<img src="{{asset('assets/images/logout.png')}}" alt="profile-user" class="avatar profile-user brround cover-image">
            									</span>
            									<div class="text-center p-1 d-flex d-lg-none-max">
            										<h6 class="mb-0" id="profile-heading">{{ auth()->user()->name}}<i class="user-angle ms-1 fa fa-angle-down "></i></h6>
            									</div>
            								</a>
            								<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            									<a class="dropdown-item" href="{{ route('logout') }}">
            										<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            											<path d="M10.6523438,16.140625c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546c0,0.276123,0.2238159,0.5,0.499939,0.500061c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.4941406-4.4941406c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481L11.359314,7.1524048c-0.1937256-0.1871338-0.5009155-0.1871338-0.6947021,0c-0.1986084,0.1918335-0.2041016,0.5083618-0.0122681,0.7069702L14.2930298,11.5H2.5C2.223877,11.5,2,11.723877,2,12s0.223877,0.5,0.5,0.5h11.7930298L10.6523438,16.140625z M16.4199829,3.0454102C11.4741821,0.5905762,5.4748535,2.6099243,3.0200195,7.5556641C2.8970337,7.8029175,2.9978027,8.1030884,3.2450562,8.2260742C3.4923706,8.3490601,3.7925415,8.248291,3.9155273,8.0010376c0.8737793-1.7612305,2.300354-3.1878052,4.0615845-4.0615845C12.428833,1.730835,17.828064,3.5492554,20.0366821,8.0010376c2.2085571,4.4517212,0.3901367,9.8509521-4.0615845,12.0595703c-4.4517212,2.2085571-9.8510132,0.3901367-12.0595703-4.0615845c-0.1229858-0.2473145-0.4231567-0.3480835-0.6704102-0.2250977c-0.2473145,0.1229858-0.3480835,0.4230957-0.2250977,0.6704102c1.6773682,3.4109497,5.1530762,5.5667114,8.9541016,5.5537109c3.7976685,0.0003662,7.2676392-2.1509399,8.9560547-5.5526733C23.3850098,11.4996338,21.3657227,5.5002441,16.4199829,3.0454102z" />
            										</svg>
            										Log out
            									</a>
            								</div>
            							</div>
            							<!-- Profile -->
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- /app-Header -->