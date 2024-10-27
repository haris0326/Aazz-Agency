<header class="page-header page-header_primary-main js_header__wrapper inner-page header_in">
    <div class="page-header__inner">
       <div class="container container_lg">
          <div class="page-header__content js_header__container">
             <div class="page-header__logo">
                <a href="/">
                <span class="visually-hidden"> writing platform</span>
                <img src="{{ asset("images/logo.svg") }}" alt="" width="110" height="28">
                </a>
             </div>
             <div class="main-menu-v3 js_main-menu-v2 js_main-menu-v4 " data-heading="Browse categories" data-level="1" id="page-header-menu">
                <button class="main-menu-v3__controls js_main-menu-controls-v4" type="button">
                <span class="main-menu-v3__prev js_main-menu-prev"></span>
                <span class="main-menu-v3__heading js_main-menu-heading-v4">Browse categories</span>
                </button>
                <div class="main-menu-v3__items">
                   <div class="main-menu-v3__item link link_tertiary link_size-inherit  js_main-menu-item main-menu-v3__item_expandable
                      ">
                      <div class="main-menu-v3__title link link_tertiary link_size-inherit js_main-menu-title " tabindex="0">
                         Services
                      </div>
                      <div class="main-dropdown-v3 js_main-dropdown-v2">
                         <div class="main-dropdown-v3__left-side js_main-dropdown-left-side ">
                            <div class="main-dropdown-v3__list main-dropdown-v3__list_flex js_main-dropdown-list">
                               <div class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item   main-dropdown-v3__item_expandable " data-id="1">
                                  <div class="main-dropdown-v3__item-title">
                                     Writing
                                  </div>
                                  <div class="main-dropdown-v3__right-side js_main-dropdown-right-side">
                                     <div class="main-dropdown-v3__section js_main-dropdown-section" data-id="1">
                                        <div class="main-dropdown-v3__sublist js_main-dropdown-sublist">
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/write-my-essay-please">Essay Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/research-papers">Research Paper Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/case-study-writing-service">Case Study Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/dissertation-writing-services">Dissertation Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/thesis-writing-service">Thesis Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/examples/">Essay Examples</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>

                               <div class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item main-dropdown-v3__item_expandable" data-id="2">
                                <div class="main-dropdown-v3__item-title">
                                    Services
                                </div>
                                <div class="main-dropdown-v3__right-side js_main-dropdown-right-side">
                                    <div class="main-dropdown-v3__section js_main-dropdown-section" data-id="2">
                                        <div class="main-dropdown-v3__sublist js_main-dropdown-sublist">
                                            @foreach($servicesList as $service)
                                                @if($service->serviceCategory)
                                                    <li>
                                                        <a href="{{ route('header_service.show', ['category_slug' => $service->serviceCategory->cat_slug, 'service_slug' => $service->serviceSEO->meta_slug, 'id' => $service->id]) }}">
                                                            {{ $service->title }}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>{{ $service->title }} (Category missing)</li>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                               <div class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item   main-dropdown-v3__item_expandable " data-id="3">
                                  <div class="main-dropdown-v3__item-title">
                                     Other
                                  </div>
                                  <div class="main-dropdown-v3__right-side js_main-dropdown-right-side">
                                     <div class="main-dropdown-v3__section js_main-dropdown-section" data-id="3">
                                        <div class="main-dropdown-v3__sublist js_main-dropdown-sublist">
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/personal-statement-writing-service">Personal Statement Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/custom-college-essay-writing-service">College Essay Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/powerpoint-presentations-writing-service">PowerPoint Presentation Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/capstone-project-writing-service">Capstone Project Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/coursework-writing-service">Coursework Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/lab-report-writing-service">Lab Report Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/literature-review-writing-service">Literature Review Writing</a>
                                           <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/speech-writing-service">Speech Writing</a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="main-menu-v3__item link link_tertiary link_size-inherit  js_main-menu-item main-menu-v3__item_expandable
                      ">
                      <div class="main-menu-v3__title link link_tertiary link_size-inherit js_main-menu-title " tabindex="0">
                         Writing Tools
                      </div>
                      <div class="main-dropdown-v3 js_main-dropdown-v2">
                         <div class="main-dropdown-v3__left-side js_main-dropdown-left-side ">
                            <div class="main-dropdown-v3__list  js_main-dropdown-list">
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/free-plagiarism-checker">Plagiarism Checker</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/citation-generators">Citation Generators</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/thesis-statement-generator">Thesis Generator</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/conclusion-generator">Conclusion Generator</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/title-page-maker">Title Page Maker</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/essay-title-generator/">Essay Title Generator</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/paraphrasing-tool">Paraphrasing Tool</a>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="main-menu-v3__item link link_tertiary link_size-inherit  js_main-menu-item  main-menu-v3__item_desc
                      ">
                      <a class="main-menu-v3__title link link_tertiary link_size-inherit js_main-menu-title " href="/howitworks">
                      How it Works
                      </a>
                   </div>
                   <div class="main-menu-v3__item link link_tertiary link_size-inherit  js_main-menu-item  main-menu-v3__item_desc
                      ">
                      <a class="main-menu-v3__title link link_tertiary link_size-inherit js_main-menu-title " href="/top-writers" onclick="gta('send','event','CTA','click','cta_top_writers');">
                      Top writers
                      </a>
                   </div>
                   <div class="main-menu-v3__item link link_tertiary link_size-inherit  js_main-menu-item main-menu-v3__item_expandable
                      ">
                      <div class="main-menu-v3__title link link_tertiary link_size-inherit js_main-menu-title " tabindex="0">
                         About us
                      </div>
                      <div class="main-dropdown-v3 js_main-dropdown-v2">
                         <div class="main-dropdown-v3__left-side js_main-dropdown-left-side ">
                            <div class="main-dropdown-v3__list  js_main-dropdown-list">
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/what-is-papersowl">What Is PapersOwl</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/testimonials">Testimonials</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/awards">Rating&amp;Awards</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/faq" onclick="gta('send','event','CTA','click','cta_faq');">FAQ</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/contactus">Contacts</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/referral-program" onclick="gta('send','event','CTA','click','cta_referral');">Referral Program</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/discounts">Promo Codes&amp;Discounts</a>
                               <a class="main-dropdown-v3__item link link_tertiary js_main-dropdown-item    " href="/blog">Blog</a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="main-menu-v3__btn-bar">
                   <div class="main-menu-v3__btn-bar-item">
                      <a href="/order" class="js_button_order button button_primary w-100 js_order_now_header_btn_action  js_button_order_ga">Hire Writer</a>
                      <script>
                         document.addEventListener('DOMContentLoaded', () => {
                         $('.js_button_order_ga').on('click',function() {
                         gta('send','event','CTA','click','order now header');
                         });
                         });
                      </script>
                   </div>
                </div>
             </div>
             <div class="overlay js_shadow-v2" style="display: none"></div>
             <script>
                document.addEventListener('deferred_scripts_loaded', function () {
                new Header.DropdownMenu('', {"toggleActiveLeftSide":true,"highlightCurrentLink":true,"breakpoint":1176,"mobileOnDesktopIfLogged":true,"removeCloseBtn":true,"defaultMenuPosition":"afterLogo","isRightSideOpen":true});
                })
             </script>
             <div class="page-header__user-controllers">
                <a href="/signin?external_redirect=/signin_redirect" class="page-header__login-btn button button_secondary-lightest button_size-s" onclick="gta('send','event','mars_log_in','click','log_in_header');">
                <span class="c-secondary">Log in</span>
                </a>
                <script>
                   const urlParams = new URLSearchParams(window.location.search);
                   if (urlParams.has('login-first')) {
                   window.location.href = '/signin';
                   }
                </script>
                <a href="/order?cta_btn=CTA_Header" class="js_button_order page-header__order-btn button button_primary button_size-s js_order_now_header_btn_action  js_button_order_ga">Place an order</a>
                <button class="page-header__hamburger page-header__hamburger_mob-ml_20 js_hamburger-menu-v4" aria-controls="page-header-menu" aria-expanded="false" type="button">
                <span class="page-header__hamburger-text visually-hidden">Menu</span>
                <span class="page-header__hamburger-ico"><span></span></span>
                </button>
             </div>
          </div>
       </div>
    </div>
 </header>
