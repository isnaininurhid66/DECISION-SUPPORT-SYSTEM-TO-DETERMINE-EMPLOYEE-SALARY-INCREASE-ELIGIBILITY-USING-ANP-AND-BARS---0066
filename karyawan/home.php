<?php
include_once("./../views/config.php");
// $tb_kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria  ");
// $tb_kriteria = mysqli_num_rows($tb_kriteria);

// $kriteria = mysqli_query($mysqli, "SELECT * FROM kriteria  ");
// $kriteria = mysqli_num_rows($kriteria);

$tb_alternatif = mysqli_query($mysqli, "SELECT * FROM tb_alternatif where hak_akses='karyawan'");
$tb_alternatif = mysqli_num_rows($tb_alternatif);

// $penilaian = mysqli_query($mysqli, "SELECT * FROM nilai  ");
// $penilaian = mysqli_num_rows($penilaian);

?>

<div class="row">
					<!-- <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="card card-bd">
							<div class="bg-secondary card-border"></div>
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="num-text text-black font-w700">78</h2>
										<span class="fs-14">Total Project Handled</span>
									</div>
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M34.422 13.9831C34.3341 13.721 34.1756 13.4884 33.9638 13.3108C33.7521 13.1332 33.4954 13.0175 33.222 12.9766L23.649 11.5141L19.353 2.36408C19.2319 2.10638 19.0399 1.88849 18.7995 1.73587C18.5591 1.58325 18.2803 1.5022 17.9955 1.5022C17.7108 1.5022 17.4319 1.58325 17.1915 1.73587C16.9511 1.88849 16.7592 2.10638 16.638 2.36408L12.342 11.5141L2.76902 12.9766C2.49635 13.0181 2.24042 13.1341 2.02937 13.3117C1.81831 13.4892 1.6603 13.7215 1.57271 13.9831C1.48511 14.2446 1.47133 14.5253 1.53287 14.7941C1.59441 15.063 1.72889 15.3097 1.92152 15.5071L8.89802 22.6501L7.24802 32.7571C7.20299 33.0345 7.23679 33.3189 7.34555 33.578C7.45431 33.8371 7.63367 34.0605 7.86319 34.2226C8.09271 34.3847 8.36315 34.4791 8.64371 34.495C8.92426 34.5109 9.20365 34.4477 9.45002 34.3126L18 29.5906L26.55 34.3126C26.7964 34.4489 27.0761 34.5131 27.3573 34.4978C27.6384 34.4826 27.9096 34.3885 28.1398 34.2264C28.37 34.0643 28.5499 33.8406 28.659 33.5811C28.768 33.3215 28.8018 33.0365 28.7565 32.7586L27.1065 22.6516L34.0785 15.5071C34.2703 15.3091 34.4037 15.0622 34.4643 14.7933C34.5249 14.5245 34.5103 14.2441 34.422 13.9831Z" fill="#864AD1"/>
									</svg>
								</div>
							</div>
						</div>
					</div> -->
					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="card card-bd">
						<div class="bg-warning card-border"></div>
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="num-text text-black font-w700"><?php echo $tb_alternatif; ?></h2>
										<span class="fs-14">Jumlah Karyawan</span>
									</div>
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.8935 22.5C23.6925 22.5 28.3935 17.799 28.3935 12C28.3935 6.20101 23.6925 1.5 17.8935 1.5C12.0945 1.5 7.39351 6.20101 7.39351 12C7.39351 17.799 12.0945 22.5 17.8935 22.5Z" fill="#FFB930"/>
										<path d="M29.5605 21.3344C29.217 20.9909 28.851 20.6699 28.476 20.3564C27.2159 21.96 25.6078 23.2562 23.7733 24.1472C21.9388 25.0382 19.9259 25.5007 17.8864 25.4996C15.847 25.4986 13.8345 25.0342 12.0009 24.1414C10.1673 23.2486 8.56051 21.9507 7.30199 20.3459C5.447 21.8906 3.95577 23.8256 2.9347 26.013C1.91364 28.2003 1.3879 30.586 1.39499 32.9999C1.39499 33.3978 1.55303 33.7793 1.83433 34.0606C2.11564 34.3419 2.49717 34.4999 2.89499 34.4999H32.895C33.2928 34.4999 33.6743 34.3419 33.9557 34.0606C34.237 33.7793 34.395 33.3978 34.395 32.9999C34.4004 30.8324 33.9759 28.6854 33.146 26.683C32.3162 24.6807 31.0975 22.8627 29.5605 21.3344Z" fill="#FFB930"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="card card-bd">
						<div class="bg-primary card-border"></div>
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="num-text text-black font-w700">93</h2>
										<span class="fs-14">Total Unfinished Task</span>
									</div>
									<svg class="primary-icon" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.9999 1.5H5.99994C3.51466 1.5 1.49994 3.51472 1.49994 6V29.8125C1.49994 32.2977 3.51466 34.3125 5.99994 34.3125H11.9999C14.4852 34.3125 16.4999 32.2977 16.4999 29.8125V6C16.4999 3.51472 14.4852 1.5 11.9999 1.5Z" fill="#20F174"/>
										<path d="M30 1.5H24C21.5147 1.5 19.5 3.51472 19.5 6V12C19.5 14.4853 21.5147 16.5 24 16.5H30C32.4853 16.5 34.5 14.4853 34.5 12V6C34.5 3.51472 32.4853 1.5 30 1.5Z" fill="#20F174"/>
										<path d="M30 19.5H24C21.5147 19.5 19.5 21.5147 19.5 24V30C19.5 32.4853 21.5147 34.5 24 34.5H30C32.4853 34.5 34.5 32.4853 34.5 30V24C34.5 21.5147 32.4853 19.5 30 19.5Z" fill="#20F174"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="card card-bd">
							<div class="bg-info card-border"></div>
							<div class="card-body">
								<div class="media align-items-center">
									<div class="media-body mr-3">
										<h2 class="num-text text-black font-w700">12</h2>
										<span class="fs-14">Unread Messages</span>
									</div>
									<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M34.4999 1.91663H11.4999C8.95917 1.91967 6.52338 2.93032 4.72682 4.72688C2.93026 6.52345 1.91961 8.95924 1.91656 11.5V26.8333C1.91935 29.0417 2.6834 31.1816 4.07994 32.8924C5.47648 34.6031 7.42011 35.7801 9.58323 36.225V42.1666C9.58318 42.5136 9.67733 42.8541 9.85564 43.1518C10.0339 43.4495 10.2897 43.6932 10.5957 43.8569C10.9016 44.0206 11.2463 44.0982 11.5929 44.0813C11.9395 44.0645 12.275 43.9539 12.5636 43.7613L23.5749 36.4166H34.4999C37.0406 36.4136 39.4764 35.4029 41.273 33.6064C43.0695 31.8098 44.0802 29.374 44.0832 26.8333V11.5C44.0802 8.95924 43.0695 6.52345 41.273 4.72688C39.4764 2.93032 37.0406 1.91967 34.4999 1.91663ZM30.6666 24.9166H15.3332C14.8249 24.9166 14.3374 24.7147 13.9779 24.3552C13.6185 23.9958 13.4166 23.5083 13.4166 23C13.4166 22.4916 13.6185 22.0041 13.9779 21.6447C14.3374 21.2852 14.8249 21.0833 15.3332 21.0833H30.6666C31.1749 21.0833 31.6624 21.2852 32.0219 21.6447C32.3813 22.0041 32.5832 22.4916 32.5832 23C32.5832 23.5083 32.3813 23.9958 32.0219 24.3552C31.6624 24.7147 31.1749 24.9166 30.6666 24.9166ZM34.4999 17.25H11.4999C10.9916 17.25 10.5041 17.048 10.1446 16.6886C9.78517 16.3291 9.58323 15.8416 9.58323 15.3333C9.58323 14.825 9.78517 14.3374 10.1446 13.978C10.5041 13.6186 10.9916 13.4166 11.4999 13.4166H34.4999C35.0082 13.4166 35.4957 13.6186 35.8552 13.978C36.2146 14.3374 36.4166 14.825 36.4166 15.3333C36.4166 15.8416 36.2146 16.3291 35.8552 16.6886C35.4957 17.048 35.0082 17.25 34.4999 17.25Z" fill="#3ECDFF"/>
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="card">
							<div class="card-header d-block border-0 pb-0">
								<div class="d-flex justify-content-between pb-3">
									<h4 class="mb-0 text-black fs-20">Project Created</h4>
									<div class="dropdown">
										<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
										<div class="dropdown-menu dropdown-menu-left">
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-center">
									<span class="fs-36 text-black font-w600 mr-4">25%</span>
									<div>
										<svg class="mr-2" width="27" height="14" viewBox="0 0 27 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M0 13.435L13.435 0L26.8701 13.435H0Z" fill="#2FCA51"></path>
										</svg>
										<span>last month $563,443</span>
									</div>
								</div>
							</div>
							<div class="card-body pb-0 px-2 pt-2">
								<div id="chartTimeline" class="timeline-chart"></div>
							</div>
						</div>		
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card">	
							<div class="card-header border-0 pb-0">
								<h4 class="fs-20 mb-0 text-black">New Clients</h4>
								<div class="dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-left">
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
							<div class="card-body text-center pb-0 px-2 pt-2">
								<div id="widgetChart1" class="widgetChart1 dashboard-chart"></div>
							</div>
						</div>
					</div>		
					<div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card">	
							<div class="card-header border-0 pb-0">
								<h4 class="fs-20 mb-0 text-black">Monthly Target</h4>
								<div class="dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-left">
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
									</div>
								</div>
							</div>
							<div class="card-body text-center pt-0">
								<div id="radialChart" class="monthly-project-chart"></div>
								<span class="fs-14 text-black d-block op5">100 Projects/ monthy</span>
							</div>
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">	
									<div class="card-header border-0">
										<h4 class="fs-16 text-black font-w500">Project Released</h4>
										<div class="d-flex align-items-center">
											<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1.90735e-06 0.499999L7 7.5L14 0.5" fill="#FF6746"/>
											</svg>
											<span class="fs-28 font-w600 ml-2 text-black">4%</span>
										</div>
									</div>
									<div class="card-body text-center pb-0 p-0">
										<div id="widgetChart2" class="dashboard-chart"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body text-center d-flex align-items-center justify-content-between">
										<div class="d-inline-block position-relative donut-chart-sale">
											<span class="donut1" data-peity='{ "fill": ["rgb(67, 220, 128, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 33, "radius": 10}'>3/8</span>
											<small class="text-primary">29%</small>
										</div>
										<div>
											<h2 class="fs-28 font-w600 mb-0 text-right text-black">567</h2>
											<p class="mb-0 fs-14 font-w400 text-black">Contacts Added</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card message-bx">
									<div class="card-header border-0 d-sm-flex d-block pb-0">
										<div>
											<h4 class="fs-20 mb-0  text-black mb-sm-0 mb-2">Recent Messages</h4>
										</div>
										<a href="contacts.html" class="btn btn-primary shadow-primary btn-rounded text-white">+ New Message</a>
									</div>
									<div class="card-body">
										<div class="media mb-3 pb-3 border-bottom">
											<div class="image-bx mr-sm-4 mr-2">
												<img src="../images/profile/Untitled-1.jpg" alt="" class="rounded-circle img-1">
												<span class="active"></span>
											</div>
											<div class="media-body d-sm-flex justify-content-between d-block align-items-center">
												<div class="mr-sm-3 mr-0">
													<h6 class="fs-16 font-w600 mb-sm-2 mb-0"><a href="messages.html" class="text-black">Laura Chyan</a></h6>
													<p class="text-black mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
													<span class="fs-14">5m ago</span>
												</div>
											</div>
										</div>
										<div class="media mb-3 pb-3 border-bottom">
											<div class="image-bx mr-sm-4 mr-2">
												<img src="../images/profile/Untitled-2.jpg" alt="" class="rounded-circle img-1">
											</div>
											<div class="media-body d-sm-flex justify-content-between d-block align-items-center">
												<div class="mr-sm-3 mr-0">
													<h6 class="fs-16 font-w600 mb-sm-2 mb-0"><a href="messages.html" class="text-black">Olivia Rellaq</a></h6>
													<p class="text-black mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
													<span class="fs-14">41m ago</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="image-bx mr-sm-4 mr-2">
												<img src="../images/profile/Untitled-3.jpg" alt="" class="rounded-circle img-1">
												<span class="active"></span>
											</div>
											<div class="media-body d-sm-flex justify-content-between d-block align-items-center">
												<div class="mr-sm-3 mr-0">
													<h6 class="fs-16 font-w600 mb-sm-2 mb-0"><a href="messages.html" class="text-black">Keanu Tipes</a></h6>
													<p class="text-black mb-1">Nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum...</p>
													<span class="fs-14">25m ago</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6 col-xxl-12">
						<div class="row">
							<div class="col-md-6">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<div class="mr-2">
											<h4 class="fs-20 mb-0 font-w500 text-black">Upcoming Projects</h4>
										</div>
									</div>
									<div class="card-body">
										<div class="border-bottom up-project-bx pb-4 mb-4">
											<span class="fs-16 text-primary mb-2 d-block sub-title font-w500">Yoast Esac</span>
											<div class="d-flex">
												<p class="font-w500 mr-auto mb-2 title fs-20"><a href="post-details.html" class="text-black">Redesign Kripton Mobile App</a></p>
												<div class="dropdown mb-3">
													<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</a>
													<div class="dropdown-menu dropdown-menu-left">
														<a class="dropdown-item" href="javascript:void(0);">Edit</a>
														<a class="dropdown-item" href="javascript:void(0);">Delete</a>
													</div>
												</div>
											</div>
											<div class="mb-3"><i class="fa fa-calendar-o mr-3" aria-hidden="true"></i>Created on Sep 8th, 2020</div>
											<div class="media align-items-center">
												<div class="power-ic mr-3">
													<i class="fa fa-bolt" aria-hidden="true"></i>
												</div>
												<div class="media-body">
													<p class="mb-1">Deadline</p>
													<span class="text-black font-w600">Tuesday,  Sep 29th 2020</span>
												</div>
											</div>
										</div>
										<div class="border-bottom up-project-bx pb-4 mb-4">
											<span class="fs-16 text-primary mb-2 d-block sub-title font-w500">Yoast Esac</span>
											<div class="d-flex">
												<p class="font-w500 mr-auto title mb-2 fs-20"><a href="post-details.html" class="text-black">Build Branding Persona for Etza.id</a></p>
												<div class="dropdown mb-3">
													<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</a>
													<div class="dropdown-menu dropdown-menu-left">
														<a class="dropdown-item" href="javascript:void(0);">Edit</a>
														<a class="dropdown-item" href="javascript:void(0);">Delete</a>
													</div>
												</div>
											</div>
											<div class="mb-3"><i class="fa fa-calendar-o mr-3" aria-hidden="true"></i>Created on Sep 8th, 2020</div>
											<div class="media align-items-center">
												<div class="power-ic mr-3">
													<i class="fa fa-bolt" aria-hidden="true"></i>
												</div>
												<div class="media-body">
													<p class="mb-1">Deadline</p>
													<span class="text-black font-w600">Tuesday,  Sep 29th 2020</span>
												</div>
											</div>
										</div>
										<div class="up-project-bx">
											<span class="fs-16 text-primary sub-title mb-2 d-block font-w500">Yoast Esac</span>
											<div class="d-flex">
												<p class="font-w500 mr-auto title mb-2 fs-20"><a href="post-details.html" class="text-black">Manage SEO for Eclan Company Profile</a></p>
												<div class="dropdown mb-3">
													<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
													</a>
													<div class="dropdown-menu dropdown-menu-left">
														<a class="dropdown-item" href="javascript:void(0);">Edit</a>
														<a class="dropdown-item" href="javascript:void(0);">Delete</a>
													</div>
												</div>
											</div>
											<div class="mb-3"><i class="fa fa-calendar-o mr-3" aria-hidden="true"></i>Created on Sep 8th, 2020</div>
											<div class="media align-items-center">
												<div class="power-ic mr-3">
													<i class="fa fa-bolt" aria-hidden="true"></i>
												</div>
												<div class="media-body">
													<p class="mb-1">Deadline</p>
													<span class="text-black font-w600">Tuesday,  Sep 29th 2020</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card kanbanPreview-bx">
									<div class="card-body">
										<div class="sub-card bg-secondary d-flex text-white">
											<div class="mr-auto pr-2">
												<h4 class="fs-20 mb-0 font-w600 text-white">Quick To-Do List</h4>
												<span class="fs-14 op6 font-w200">Lorem ipsum dolor sit amet</span>
											</div>
											<a href="contacts.html" class="plus-icon"><i class="fa fa-plus" aria-hidden="true"></i></a>
										</div>
										<div class="sub-card">
											<span class="text-warning sub-title fs-14">Graphic Deisgner</span>
											<p class="font-w500"><a href="post-details.html" class="text-black">Visual Graphic for Presentation to Client</a></p>
											<div class="row justify-content-between align-items-center">
												<div class="col-6">
													<span>Aug 4, 2021</span>
												</div>
												<ul class="users col-6">
													<li><img src="../images/profile/Untitled-4.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-5.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-5.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-7.jpg" alt=""></li>
												</ul>
												
											</div>
										</div>
										<div class="sub-card">
											<span class="text-primary sub-title fs-14">Database Engineer</span>
											<p class="font-w500"><a href="post-details.html" class="text-black">Build Database Design for Fasto Admin v2</a></p>
											<div class="row justify-content-between align-items-center">
												<div class="col-6">
													<span>Aug 4, 2021</span>
												</div>
												<ul class="users col-6">
													<li><img src="../images/profile/Untitled-4.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-5.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-6.jpg" alt=""></li>
												</ul>
											</div>
										</div>
										<div class="sub-card">
											<span class="text-secondary sub-title fs-14">Digital Marketing</span>
											<p class="font-w500"><a href="post-details.html" class="text-black">Make Promotional Ads for Instagram Fasto’s</a></p>
											<div class="row justify-content-between align-items-center mb-4">
												<div class="col-6">
													<span>Aug 4, 2021</span>
												</div>
												<ul class="users col-6">
													<li><img src="../images/profile/Untitled-4.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-5.jpg" alt=""></li>
													<li><img src="../images/profile/Untitled-6.jpg" alt=""></li>
												</ul>
											</div>
											<span><i class="fa fa-comment-o mr-2"></i>2 Comment</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			 -->