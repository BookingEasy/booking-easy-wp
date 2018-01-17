webpackJsonp(["main"],{

/***/ "../../../../../src/$$_lazy_route_resource lazy recursive":
/***/ (function(module, exports) {

function webpackEmptyAsyncContext(req) {
	// Here Promise.resolve().then() is used instead of new Promise() to prevent
	// uncatched exception popping up in devtools
	return Promise.resolve().then(function() {
		throw new Error("Cannot find module '" + req + "'.");
	});
}
webpackEmptyAsyncContext.keys = function() { return []; };
webpackEmptyAsyncContext.resolve = webpackEmptyAsyncContext;
module.exports = webpackEmptyAsyncContext;
webpackEmptyAsyncContext.id = "../../../../../src/$$_lazy_route_resource lazy recursive";

/***/ }),

/***/ "../../../../../src/app/app.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"container-fluid\">\n\n    <div *ngIf=\"currentAction===1 || currentAction===3\">\n        <!--\n        <div class=\"row\">\n            <div class=\"col text-center\">\n                <div class=\"btn-group\">\n                    <div class=\"btn btn-primary\" (click)=\"viewType = 'cal'\" [class.active]=\"viewType === 'cal'\">\n                        <img src=\"../assets/img/octicons/svg/calendar.svg\" width=\"25\" height=\"25\" alt=\"calendar\">\n                    </div>\n                    <div class=\"btn btn-primary\" (click)=\"viewType = 'list'\" [class.active]=\"viewType === 'list'\">\n                        <img src=\"../assets/img/octicons/svg/list-unordered.svg\" width=\"25\" height=\"25\" alt=\"list\">\n                    </div>\n                </div>\n            </div>\n        </div>\n    -->\n        <div class=\"row\">\n            <div class=\"col\">&nbsp;</div>\n        </div>\n\n        <div class=\"row\">\n            <div class=\"col text-center\">\n                <div *ngIf=\"currentAction===3\" class=\"alert alert-success\" role=\"alert\">\n                    <div>\n                        <strong>Thanks for your subscription!</strong>\n                    </div>\n                    <div>You will soon get a notification by email and optionally by SMS.</div>\n                </div>\n            </div>\n        </div>\n\n        <div class=\"row\">\n            <div class=\"col\">\n                <div *ngIf=\"viewType == 'list'; else calendarBlock\">\n                    <app-list (eventSelected)=\"handelCurrentAction($event)\"></app-list>\n                </div>\n                <ng-template #calendarBlock>\n                    <app-calendar (eventSelected)=\"handelCurrentAction($event)\"></app-calendar>\n                </ng-template>\n            </div>\n        </div>\n    </div>\n\n    <div *ngIf=\"currentAction===2\">\n        <app-subscription [calendarEvent]=\"calendarEvent\" (eventSelected)=\"handelCurrentAction($event)\"></app-subscription>\n    </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/app.component.scss":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/app.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

// TODO : replace with StateMachine Pattern?
var CurrentAction;
(function (CurrentAction) {
    CurrentAction[CurrentAction["date_selection"] = 1] = "date_selection";
    CurrentAction[CurrentAction["subscription"] = 2] = "subscription";
    CurrentAction[CurrentAction["done"] = 3] = "done";
})(CurrentAction || (CurrentAction = {}));
var AppComponent = /** @class */ (function () {
    function AppComponent() {
        this.currentAction = 1;
    }
    AppComponent.prototype.handelCurrentAction = function (eventData) {
        this.currentAction = eventData.currentAction;
        this.calendarEvent = eventData.event;
    };
    AppComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'app-root',
            template: __webpack_require__("../../../../../src/app/app.component.html"),
            styles: [__webpack_require__("../../../../../src/app/app.component.scss")],
        })
    ], AppComponent);
    return AppComponent;
}());



/***/ }),

/***/ "../../../../../src/app/app.module.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return AppModule; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__ = __webpack_require__("../../../../../src/app/services/singleton.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_app_previous_today_next_buttons_previous_today_next_buttons_component__ = __webpack_require__("../../../../../src/app/previous-today-next-buttons/previous-today-next-buttons.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_progress_bar_service__ = __webpack_require__("../../../../../src/app/services/progress-bar.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__progress_bar_progress_bar_component__ = __webpack_require__("../../../../../src/app/progress-bar/progress-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__timeleft_pipe__ = __webpack_require__("../../../../../src/app/timeleft.pipe.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7__angular_forms__ = __webpack_require__("../../../forms/esm5/forms.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_9__angular_common__ = __webpack_require__("../../../common/esm5/common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_10__app_component__ = __webpack_require__("../../../../../src/app/app.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_11__angular_platform_browser_animations__ = __webpack_require__("../../../platform-browser/esm5/animations.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_12_angular_calendar__ = __webpack_require__("../../../../angular-calendar/esm5/angular-calendar.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_13__services_api3_service__ = __webpack_require__("../../../../../src/app/services/api3.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_14__subscription_subscription_component__ = __webpack_require__("../../../../../src/app/subscription/subscription.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_15__calendar_calendar_component__ = __webpack_require__("../../../../../src/app/calendar/calendar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_16__list_list_component__ = __webpack_require__("../../../../../src/app/list/list.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_17__ng_bootstrap_ng_bootstrap__ = __webpack_require__("../../../../@ng-bootstrap/ng-bootstrap/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_18__angular_common_locales_fr__ = __webpack_require__("../../../common/locales/fr.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

















// import { BsDropdownModule } from 'ngx-bootstrap/dropdown';



Object(__WEBPACK_IMPORTED_MODULE_9__angular_common__["e" /* registerLocaleData */])(__WEBPACK_IMPORTED_MODULE_18__angular_common_locales_fr__["a" /* default */], 'fr');
var AppModule = /** @class */ (function () {
    function AppModule() {
    }
    AppModule = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_6__angular_core__["H" /* NgModule */])({
            declarations: [
                __WEBPACK_IMPORTED_MODULE_10__app_component__["a" /* AppComponent */],
                __WEBPACK_IMPORTED_MODULE_14__subscription_subscription_component__["a" /* SubscriptionComponent */],
                __WEBPACK_IMPORTED_MODULE_15__calendar_calendar_component__["a" /* CalendarComponent */],
                __WEBPACK_IMPORTED_MODULE_16__list_list_component__["a" /* ListComponent */],
                __WEBPACK_IMPORTED_MODULE_3__progress_bar_progress_bar_component__["a" /* ProgressBarComponent */],
                __WEBPACK_IMPORTED_MODULE_4__timeleft_pipe__["a" /* TimeleftPipe */],
                __WEBPACK_IMPORTED_MODULE_1_app_previous_today_next_buttons_previous_today_next_buttons_component__["a" /* PreviousTodayNextComponent */]
            ],
            imports: [
                __WEBPACK_IMPORTED_MODULE_17__ng_bootstrap_ng_bootstrap__["a" /* NgbModule */].forRoot(),
                // BsDropdownModule.forRoot(),
                __WEBPACK_IMPORTED_MODULE_5__angular_platform_browser__["a" /* BrowserModule */],
                __WEBPACK_IMPORTED_MODULE_9__angular_common__["a" /* CommonModule */],
                __WEBPACK_IMPORTED_MODULE_7__angular_forms__["a" /* FormsModule */],
                __WEBPACK_IMPORTED_MODULE_8__angular_common_http__["b" /* HttpClientModule */],
                __WEBPACK_IMPORTED_MODULE_11__angular_platform_browser_animations__["a" /* BrowserAnimationsModule */],
                __WEBPACK_IMPORTED_MODULE_12_angular_calendar__["a" /* CalendarModule */].forRoot()
            ],
            providers: [__WEBPACK_IMPORTED_MODULE_13__services_api3_service__["a" /* APIv3Service */], __WEBPACK_IMPORTED_MODULE_2__services_progress_bar_service__["a" /* ProgressBarService */], __WEBPACK_IMPORTED_MODULE_3__progress_bar_progress_bar_component__["a" /* ProgressBarComponent */], __WEBPACK_IMPORTED_MODULE_1_app_previous_today_next_buttons_previous_today_next_buttons_component__["a" /* PreviousTodayNextComponent */], __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__["a" /* SingletonService */]],
            bootstrap: [__WEBPACK_IMPORTED_MODULE_10__app_component__["a" /* AppComponent */]]
        })
    ], AppModule);
    return AppModule;
}());



/***/ }),

/***/ "../../../../../src/app/calendar/calendar.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "/*\nh3 {\n    margin: 0 0 10px;\n}\n\npre {\n    background-color: #f5f5f5;\n    padding: 15px;\n}\n\n.btn-primary, .btn-primary.dropdown-toggle  {\n    background-color: #58b5ab;\n    border-color: #3e8e84;\n}\n*/\n/*\n.cal-month-view .cal-open-day-events {\n    background-color: #343534;\n}\n\na {\n    color:  #58b5ab;\n}\n\na:hover {\n    color:  #58b5ab;\n}\n*/", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/calendar/calendar.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"row text-center\">\n    <div class=\"col-md-4\">\n        <div class=\"btn-group\">\n            <div class=\"btn btn-primary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarPreviousView [view]=\"view\" [(viewDate)]=\"viewDate\">\n                {{ sagendaTranslationPrevious ? sagendaTranslationPrevious: 'Previous'}}\n            </div>\n            <div class=\"btn btn-secondary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarToday [(viewDate)]=\"viewDate\">\n                {{ sagendaTranslationToday ? sagendaTranslationToday: 'Today'}}\n            </div>\n            <div class=\"btn btn-primary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarNextView [view]=\"view\" [(viewDate)]=\"viewDate\">\n                {{ sagendaTranslationNext ? sagendaTranslationNext : 'Next'}}\n            </div>\n        </div>\n    </div>\n\n    <div class=\"col-md-4 text-center\">\n        <h2>{{ viewDate | calendarDate:(view + 'ViewTitle'): languageShortName }}</h2>\n    </div>\n    <div class=\"col-md-4\">\n        <div class=\"btn-group\">\n            <div class=\"btn btn-primary\" (click)=\"view = 'month'\" [class.active]=\"view === 'month'\">\n                {{ sagendaTranslationMonth ? sagendaTranslationMonth : 'Month'}}\n            </div>\n            <div class=\"btn btn-primary\" (click)=\"view = 'week'\" [class.active]=\"view === 'week'\">\n                {{ sagendaTranslationWeek ? sagendaTranslationWeek : 'Week'}}\n            </div>\n            <div class=\"btn btn-primary\" (click)=\"view = 'day'\" [class.active]=\"view === 'day'\">\n                {{ sagendaTranslationDay ? sagendaTranslationDay : 'Day'}}\n            </div>\n        </div>\n    </div>\n</div>\n\n<div class=\"row\">\n    <div class=\"col\">&nbsp;</div>\n</div>\n<!--\n<div class=\"row\">\n    <div class=\"col text-center\">\n        <div class=\"btn-group\" dropdown>\n            <button dropdownToggle type=\"button\" class=\"btn btn-primary dropdown-toggle\">\n                {{selectedBookableItem ? selectedBookableItem.name : 'Please select...'}}\n                <span class=\"caret\"></span>\n            </button>\n            <ul *dropdownMenu class=\"dropdown-menu\" role=\"menu\">\n                <div *ngFor=\"let bookableItem of bookableItems\" (click)=\"OnChangeBookableItem(bookableItem)\">\n                    <li role=\"menuitem\">\n                        <a class=\"dropdown-item\" href=\"#\">{{bookableItem.name}}</a>\n                    </li>\n                </div>\n            </ul>\n        </div>\n    </div>\n</div>\n-->\n\n\n<div class=\"row\">\n    <div class=\"col-md-4\">&nbsp;</div>\n    <div class=\"col-md-4  text-center\">\n        <div ngbDropdown class=\"d-inline-block\">\n            <button class=\"btn btn-outline-primary\" id=\"dropdownBookableItem\" ngbDropdownToggle>{{selectedBookableItem ? selectedBookableItem.name : 'Please select...'}}</button>\n            <div ngbDropdownMenu aria-labelledby=\"dropdownBookableItem\">\n                <div *ngFor=\"let bookableItem of bookableItems\" (click)=\"OnChangeBookableItem(bookableItem)\">\n                    <button class=\"dropdown-item\">{{bookableItem.name}}</button>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div class=\"col-md-4\">&nbsp;</div>\n</div>\n\n\n<div class=\"row\">\n    <div class=\"col\">&nbsp;</div>\n</div>\n\n<app-progress-bar></app-progress-bar>\n\n<div class=\"row\">\n    <div class=\"col\">&nbsp;</div>\n</div>\n\n<div [ngSwitch]=\"view\">\n    <mwl-calendar-month-view [locale]=\"languageShortName\" weekStartsOn=\"{{weekStartsOn}}\" *ngSwitchCase=\"'month'\" [viewDate]=\"viewDate\"\n        [events]=\"events\" [refresh]=\"refresh\" [activeDayIsOpen]=\"activeDayIsOpen\" (dayClicked)=\"dayClicked($event.day)\" (eventClicked)=\"handleEvent('Clicked', $event.event)\"\n        (eventTimesChanged)=\"eventTimesChanged($event)\">\n    </mwl-calendar-month-view>\n    <mwl-calendar-week-view [locale]=\"languageShortName\" precision=\"minutes\" *ngSwitchCase=\"'week'\" [viewDate]=\"viewDate\" [events]=\"events\"\n        [refresh]=\"refresh\" (eventClicked)=\"handleEvent('Clicked', $event.event)\" (eventTimesChanged)=\"eventTimesChanged($event)\">\n    </mwl-calendar-week-view>\n    <mwl-calendar-day-view [locale]=\"languageShortName\" *ngSwitchCase=\"'day'\" [viewDate]=\"viewDate\" [events]=\"events\" [refresh]=\"refresh\"\n        (eventClicked)=\"handleEvent('Clicked', $event.event)\" (eventTimesChanged)=\"eventTimesChanged($event)\">\n    </mwl-calendar-day-view>\n</div>"

/***/ }),

/***/ "../../../../../src/app/calendar/calendar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return CalendarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__ = __webpack_require__("../../../../../src/app/services/singleton.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__progress_bar_progress_bar_component__ = __webpack_require__("../../../../../src/app/progress-bar/progress-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_date_fns__ = __webpack_require__("../../../../date-fns/index.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_date_fns___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_date_fns__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4_rxjs_Subject__ = __webpack_require__("../../../../rxjs/_esm5/Subject.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_5__services_api3_service__ = __webpack_require__("../../../../../src/app/services/api3.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_6_rxjs_add_operator_map__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/map.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_7_rxjs_add_operator_catch__ = __webpack_require__("../../../../rxjs/_esm5/add/operator/catch.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_8_rxjs_add_observable_throw__ = __webpack_require__("../../../../rxjs/_esm5/add/observable/throw.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};









var CalendarComponent = /** @class */ (function () {
    /**
     * Constructor
     */
    function CalendarComponent(apiv3Service, progressBarComponent, singletonService) {
        var _this = this;
        this.apiv3Service = apiv3Service;
        this.progressBarComponent = progressBarComponent;
        this.singletonService = singletonService;
        this.eventSelected = new __WEBPACK_IMPORTED_MODULE_2__angular_core__["v" /* EventEmitter */]();
        this.activeDayIsOpen = true;
        this.view = 'month';
        this.viewType = 'calendar';
        this.refresh = new __WEBPACK_IMPORTED_MODULE_4_rxjs_Subject__["a" /* Subject */]();
        this.events = [];
        this.bookableItems = [];
        this.weekStartsOn = this.getWeekStartsOn();
        this.languageShortName = this.getLanguageShortName();
        this.languageCultureShortName = this.getLanguageCultureShortName();
        this.sagendaDateFormat = _window().sagendaDateFormat;
        this.sagendaTimeFormat = _window().sagendaTimeFormat;
        // translations
        this.sagendaTranslationNext = _window().sagendaTranslationNext;
        this.sagendaTranslationToday = _window().sagendaTranslationToday;
        this.sagendaTranslationPrevious = _window().sagendaTranslationPrevious;
        this.sagendaTranslationMonth = _window().sagendaTranslationMonth;
        this.sagendaTranslationWeek = _window().sagendaTranslationWeek;
        this.sagendaTranslationDay = _window().sagendaTranslationDay;
        this.progressBarComponent = progressBarComponent;
        this.singletonService.viewDate.subscribe(function (viewDate) { _this.viewDate = viewDate; });
        this.singletonService.bearerToken.subscribe(function (bearerToken) { _this.bearerToken = bearerToken; });
    }
    /**
     * By clicking on "Previous / Today / Next" buttons we refresh the events.
     */
    CalendarComponent.prototype.OnChangePreviousTodayNext = function () {
        this.getEvents();
        this.singletonService.setViewDate(this.viewDate);
    };
    /**
     * By changing the bookable item in the list we set the newly selected item and refresh events.
     */
    CalendarComponent.prototype.OnChangeBookableItem = function (item) {
        this.selectedBookableItem = item;
        this.getEvents();
    };
    CalendarComponent.prototype.ngOnInit = function () {
        this.getBearerToken();
    };
    /**
     * Try to get the bearer token by the view (as for WordPress plugin), if not found (as for Angular dev environment, get the brearer token with the sagenda token).
     */
    CalendarComponent.prototype.getBearerToken = function () {
        var _this = this;
        if (_window().window.sagendaBearerToken) {
            this.bearerToken = _window().window.sagendaBearerToken;
        }
        else {
            this.apiv3Service.getBearerToken('token', _window().window.sagendaToken).subscribe(function (objects) {
                _this.bearerToken = objects;
                _this.getBookableItems(_this.bearerToken);
                _this.singletonService.setBearerToken(objects);
            });
        }
    };
    /**
     * Get events
     */
    CalendarComponent.prototype.getEvents = function () {
        var _this = this;
        this.progressBarComponent.displayProgressBar(true);
        this.apiv3Service.getEvents(this.viewDate, this.selectedBookableItem, this.sagendaDateFormat, this.sagendaTimeFormat, this.languageCultureShortName, this.bearerToken).subscribe(function (objects) {
            _this.events = objects;
            _this.refresh.next();
            _this.progressBarComponent.displayProgressBar(false);
        });
    };
    /**
     * Get bookable items list
     */
    CalendarComponent.prototype.getBookableItems = function (bearerToken) {
        var _this = this;
        this.apiv3Service.getBookableItems(bearerToken).subscribe(function (objects) {
            _this.bookableItems = objects;
            _this.selectedBookableItem = objects[0];
            _this.getEvents();
        });
    };
    /**
     * Action on event click
     */
    CalendarComponent.prototype.dayClicked = function (_a) {
        var date = _a.date, events = _a.events;
        if (Object(__WEBPACK_IMPORTED_MODULE_3_date_fns__["isSameMonth"])(date, this.viewDate)) {
            if ((Object(__WEBPACK_IMPORTED_MODULE_3_date_fns__["isSameDay"])(this.viewDate, date) && this.activeDayIsOpen === true) ||
                events.length === 0) {
                this.activeDayIsOpen = false;
            }
            else {
                this.activeDayIsOpen = true;
                this.viewDate = date;
            }
        }
    };
    // TODO : this look a bit dirty, better implement a StateMachine pattern or maybe Redux in Reactive X lib.
    CalendarComponent.prototype.handleEvent = function (click, event) {
        this.eventSelected.emit({ currentAction: 2, event: event });
    };
    /**
     * Get an int representing the first day of the week. 0 = Sunday, 1= Monday...
     */
    CalendarComponent.prototype.getWeekStartsOn = function () {
        return _window().sagendaWeekStartsOn;
    };
    /**
     * Get the short version of language culture code such as "fr_CH" for Swiss-French..
     */
    CalendarComponent.prototype.getLanguageCultureShortName = function () {
        return _window().sagendaLanguageCultureShortName;
    };
    /**
     * Get the short version of language code such as "de" for German.
     */
    CalendarComponent.prototype.getLanguageShortName = function () {
        if (_window().sagendaLanguageCultureShortName != null) {
            if (_window().sagendaLanguageCultureShortName.length >= 2) {
                return _window().sagendaLanguageCultureShortName.substring(0, 2);
            }
        }
        return 'en';
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["N" /* Output */])(),
        __metadata("design:type", Object)
    ], CalendarComponent.prototype, "eventSelected", void 0);
    CalendarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["m" /* Component */])({
            selector: 'app-calendar',
            template: __webpack_require__("../../../../../src/app/calendar/calendar.component.html"),
            changeDetection: __WEBPACK_IMPORTED_MODULE_2__angular_core__["i" /* ChangeDetectionStrategy */].OnPush,
            styles: [__webpack_require__("../../../../../src/app/calendar/calendar.component.css")],
        }),
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["z" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_5__services_api3_service__["a" /* APIv3Service */], __WEBPACK_IMPORTED_MODULE_1__progress_bar_progress_bar_component__["a" /* ProgressBarComponent */], __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__["a" /* SingletonService */]])
    ], CalendarComponent);
    return CalendarComponent;
}());

/**
 * Return the window native object
 */
function _window() {
    return window;
}


/***/ }),

/***/ "../../../../../src/app/list/list.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".separation {\n    border: 5px solid #58b5ab;\n    border-right-width:0px;\n    border-bottom-width:0px;\n    border-top-width:0px;\n}", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/list/list.component.html":
/***/ (function(module, exports) {

module.exports = "\n<!--  TODO : IMPLEMENT A PREVIOUS TODAY NEXT COMPONENET IN LIST AND CALENDAR (SHARE THE SAME CODE!)\n<div class=\"row\">\n  <app-previous-today-next-buttons></app-previous-today-next-buttons>\n</div>\n--> \n<div class=\"row\">\n\n      <div class=\"col text-center\">\n      <div class=\"btn-group\" dropdown>\n        <button dropdownToggle type=\"button\" class=\"btn btn-primary dropdown-toggle\">\n          {{selectedBookableItem ? selectedBookableItem.name : 'Please select...'}}\n          <span class=\"caret\"></span>\n        </button>\n        <ul *dropdownMenu class=\"dropdown-menu\" role=\"menu\">\n          <div *ngFor=\"let bookableItem of bookableItems\" (click)=\"onBookableItemChanged(bookableItem)\">\n            <li role=\"menuitem\">\n              <a class=\"dropdown-item\" href=\"#\">{{bookableItem.name}}</a>\n            </li>\n          </div>\n        </ul>\n      </div>\n    </div>\n\n</div>\n\n<div class=\"row\">\n  <div class=\"col\">&nbsp;</div>\n</div>\n\n<app-progress-bar></app-progress-bar>\n\n<div class=\"container-fluid\" *ngFor=\"let event of events; let i = index\">\n  <div *ngIf=\"i === 0; else otherEvents\">\n    <div class=\"row table-active\">\n      <div class=\"col-12\">\n        <h2>{{event.start | date:'fullDate'}}</h2>\n      </div>\n    </div>\n  </div>\n  <ng-template #otherEvents>\n    <div class=\"row table-active\" *ngIf=\"(event.start| date:'dd/MM/yyyy') != (events[i-1].start | date:'dd/MM/yyyy')\">\n      <div class=\"col-12\">\n        <h2>{{event.start | date:'fullDate'}}</h2>\n      </div>\n    </div>\n  </ng-template>\n\n  <div class=\"row\">\n    <div class=\"col-2\">\n      <strong>{{event.start | date:'shortTime'}}\n        <br/> {{event.end | date:'shortTime'}}</strong>\n    </div>\n\n    <div *ngIf=\"event.meta.isPaidEvent === 0;else paidEvent\">\n      <div class=\"col-5 separation\">\n        <strong>{{event.meta.bookableItemName}}</strong>\n      </div>\n    </div>\n    <ng-template #paidEvent>\n      <div class=\"col-5 separation\">\n        <strong>{{event.meta.bookableItemName}}</strong>\n        <p>{{event.meta.paymentAmount}} {{event.meta.paymentCurrency}} <br/>\n        {{event.meta.paymentNote}}</p>\n      </div>\n    </ng-template>\n\n    <div class=\"col-3\">\n      {{event.start | timeleft}}\n    </div>\n    <div class=\"col-2\">\n      <button type=\"button\" class=\"btn btn-primary\" btnCheckbox btnCheckboxTrue=\"1\" btnCheckboxFalse=\"0\" (click)=\"onBookEvent(event)\">\n        Book-it!\n      </button>\n    </div>\n  </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/list/list.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ListComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__ = __webpack_require__("../../../../../src/app/services/singleton.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__progress_bar_progress_bar_component__ = __webpack_require__("../../../../../src/app/progress-bar/progress-bar.component.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__services_api3_service__ = __webpack_require__("../../../../../src/app/services/api3.service.ts");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var ListComponent = /** @class */ (function () {
    function ListComponent(apiv3Service, progressBarComponent, singletonService) {
        var _this = this;
        this.apiv3Service = apiv3Service;
        this.progressBarComponent = progressBarComponent;
        this.singletonService = singletonService;
        this.eventSelected = new __WEBPACK_IMPORTED_MODULE_2__angular_core__["v" /* EventEmitter */]();
        this.bookableItems = [];
        this.events = [];
        this.sagendaDateFormat = _window().sagendaDateFormat;
        this.sagendaTimeFormat = _window().sagendaTimeFormat;
        this.sagendaLanguageCultureShortName = _window().sagendaLanguageCultureShortName;
        this.singletonService.viewDate.subscribe(function (viewDate) { _this.viewDate = viewDate; });
        this.bearerToken = this.singletonService.bearerToken;
        this.singletonService.bearerToken.subscribe(function (bearerToken) { _this.bearerToken = bearerToken; });
    }
    ListComponent.prototype.ngOnInit = function () {
        this.getBookableItems(this.bearerToken);
    };
    /**
     * Get bookable items list
     */
    ListComponent.prototype.getBookableItems = function (bearerToken) {
        var _this = this;
        this.apiv3Service.getBookableItems(bearerToken).subscribe(function (objects) {
            _this.bookableItems = objects;
            _this.selectedBookableItem = _this.bookableItems[0];
            _this.getEvents();
        });
    };
    ListComponent.prototype.onBookableItemChanged = function (item) {
        this.selectedBookableItem = item;
        this.getEvents();
    };
    ListComponent.prototype.onBookEvent = function (event) {
        this.eventSelected.emit({ currentAction: 2, event: event });
    };
    /**
     * Get events
     */
    ListComponent.prototype.getEvents = function () {
        var _this = this;
        this.progressBarComponent.displayProgressBar(true);
        this.apiv3Service.getEvents(this.viewDate, this.selectedBookableItem, this.sagendaDateFormat, this.sagendaTimeFormat, this.sagendaLanguageCultureShortName, this.bearerToken).subscribe(function (objects) {
            _this.events = objects;
            _this.progressBarComponent.displayProgressBar(false);
        });
    };
    // TODO : this look a bit dirty, better implement a StateMachine pattern or maybe Redux in Reactive X lib.
    ListComponent.prototype.handleEvent = function (click, event) {
        this.eventSelected.emit({ currentAction: 2, event: event });
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["N" /* Output */])(),
        __metadata("design:type", Object)
    ], ListComponent.prototype, "eventSelected", void 0);
    ListComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_2__angular_core__["m" /* Component */])({
            selector: 'app-list',
            template: __webpack_require__("../../../../../src/app/list/list.component.html"),
            styles: [__webpack_require__("../../../../../src/app/list/list.component.css")]
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_3__services_api3_service__["a" /* APIv3Service */], __WEBPACK_IMPORTED_MODULE_1__progress_bar_progress_bar_component__["a" /* ProgressBarComponent */], __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__["a" /* SingletonService */]])
    ], ListComponent);
    return ListComponent;
}());

/**
 * Return the window native object
 */
function _window() {
    return window;
}


/***/ }),

/***/ "../../../../../src/app/previous-today-next-buttons/previous-today-next-buttons.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"btn-group\">\n    <div class=\"btn btn-primary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarPreviousView [view]=\"view\" [(viewDate)]=\"viewDate\">\n        {{ sagendaTranslationPrevious ? sagendaTranslationPrevious: 'Previous'}}\n    </div>\n    <div class=\"btn btn-secondary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarToday [(viewDate)]=\"viewDate\">\n        {{ sagendaTranslationToday ? sagendaTranslationToday: 'Today'}}\n    </div>\n    <div class=\"btn btn-primary\" (click)=\"OnChangePreviousTodayNext()\" mwlCalendarNextView [view]=\"view\" [(viewDate)]=\"viewDate\">\n        {{ sagendaTranslationNext ? sagendaTranslationNext : 'Next'}}\n    </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/previous-today-next-buttons/previous-today-next-buttons.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return PreviousTodayNextComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};

var PreviousTodayNextComponent = /** @class */ (function () {
    function PreviousTodayNextComponent() {
        this.viewDate = new Date();
    }
    PreviousTodayNextComponent.prototype.OnChangePreviousTodayNext = function () {
        // this.viewDate = viewdate
    };
    PreviousTodayNextComponent.prototype.ngOnInit = function () {
    };
    PreviousTodayNextComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["m" /* Component */])({
            selector: 'app-previous-today-next-buttons',
            template: __webpack_require__("../../../../../src/app/previous-today-next-buttons/previous-today-next-buttons.component.html")
        }),
        __metadata("design:paramtypes", [])
    ], PreviousTodayNextComponent);
    return PreviousTodayNextComponent;
}());



/***/ }),

/***/ "../../../../../src/app/progress-bar/progress-bar.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"container-fluid\" *ngIf=\"progressBarStatus\">\n    <div class=\"row\">\n        <div class=\"col-12\">\n            <div class=\"progress\">\n                <div class=\"progress-bar progress-bar-striped progress-bar-animated\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\"\n                    aria-valuemax=\"100\" style=\"width: 100%\"></div>\n            </div>\n        </div>\n    </div>\n    <div class=\"row\">\n        <div class=\"col-12\">\n            <p>We're fetching your datas. Sorry to make you wait...</p>\n        </div>\n    </div>\n</div>"

/***/ }),

/***/ "../../../../../src/app/progress-bar/progress-bar.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProgressBarComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_progress_bar_service__ = __webpack_require__("../../../../../src/app/services/progress-bar.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var ProgressBarComponent = /** @class */ (function () {
    function ProgressBarComponent(progressBarService) {
        this.progressBarService = progressBarService;
        this.progressBarStatus = progressBarService.progressBarStatus;
    }
    ProgressBarComponent.prototype.displayProgressBar = function (value) {
        this.progressBarService.displayProgressBar(value);
    };
    ProgressBarComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.progressBarService.progressBarStatus.subscribe(function (val) {
            _this.progressBarStatus = val;
        });
    };
    ProgressBarComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["m" /* Component */])({
            selector: 'app-progress-bar',
            template: __webpack_require__("../../../../../src/app/progress-bar/progress-bar.component.html")
        }),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_0__services_progress_bar_service__["a" /* ProgressBarService */]])
    ], ProgressBarComponent);
    return ProgressBarComponent;
}());



/***/ }),

/***/ "../../../../../src/app/services/api3.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return APIv3Service; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__ = __webpack_require__("../../../../rxjs/_esm5/Observable.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_moment__ = __webpack_require__("../../../../moment/moment.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_moment___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_moment__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__angular_common_http__ = __webpack_require__("../../../common/esm5/http.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};




var colors = {
    red: {
        primary: '#ad2121',
        secondary: '#FAE3E3'
    },
    blue: {
        primary: '#1e90ff',
        secondary: '#D1E8FF'
    },
    yellow: {
        primary: '#e3bc08',
        secondary: '#FDF1BA'
    },
    green: {
        primary: '#13a500',
        secondary: '#c0fdb6'
    }
};
var APIv3Service = /** @class */ (function () {
    function APIv3Service(httpClient) {
        this.httpClient = httpClient;
        // private baseUrl = 'https://sagenda-test.apphb.com/api/'; // TEST
        this.baseUrl = 'https://sagenda.net/api/'; // PROD
        this.webServicesDateFormat = 'YYYY-MM-DD';
    }
    // TODO : implements booking and lock
    APIv3Service.prototype.setBooking = function (calendarEvent, bearerToken) {
        var myBooking = ({
            eventIdentifier: calendarEvent.meta.eventIdentifier,
            lockIdentifier: calendarEvent.meta.eventLock,
            member: {
                email: calendarEvent.meta.email,
                firstName: calendarEvent.meta.firstName,
                lastName: calendarEvent.meta.lastName,
                courtesy: calendarEvent.meta.courtesy,
                phoneNumber: calendarEvent.meta.phone,
                description: calendarEvent.meta.description
            }
        });
        var query = myBooking;
        console.log(query);
        var headers = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpHeaders */]()
            .set('Content-Type', 'application/json')
            .set('Authorization', 'Bearer ' + bearerToken);
        var results = this.httpClient
            .post(this.baseUrl + 'v3/events', query, {
            headers: headers
        })
            .catch(handleError);
        return results;
    };
    /*
    Get Bearer token via username/pwd methode or sagenda token,
    @type : "pwd" or "token"
    */
    APIv3Service.prototype.getBearerToken = function (type, apiToken) {
        var body;
        if (type === 'token') {
            body = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["d" /* HttpParams */]()
                .set('grant_type', 'api_token')
                .set('api_token', apiToken);
        }
        var headers = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpHeaders */]().set('Content-Type', 'application/x-www-form-urlencoded');
        var bearerToken = this.httpClient
            .post(this.baseUrl + 'token', body.toString(), { headers: headers }) // don't use v3/ folder
            .map(function (object) { return mapBearer(object); })
            .catch(handleError);
        return bearerToken;
    };
    APIv3Service.prototype.getEventLock = function (bearerToken, eventIdentifier) {
        var request = ({
            eventIdentifier: eventIdentifier
        });
        console.log(request);
        var headers = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpHeaders */]()
            .set('Content-Type', 'application/json')
            .set('Authorization', 'Bearer ' + bearerToken);
        var response = this.httpClient
            .post(this.baseUrl + 'v3/eventLocks', JSON.stringify(request), { headers: headers })
            .catch(handleError);
        return response;
    };
    APIv3Service.prototype.getEvents = function (date, bookableItem, sagendaDateFormat, sagendaTimeFormat, cultureShortCode, bearerToken) {
        var headers = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpHeaders */]().set('Authorization', 'Bearer ' + bearerToken);
        var startDate = __WEBPACK_IMPORTED_MODULE_2_moment__(date).startOf('month');
        var today = __WEBPACK_IMPORTED_MODULE_2_moment__();
        var endDate = __WEBPACK_IMPORTED_MODULE_2_moment__(date).endOf('month');
        if (today > startDate) {
            startDate = today;
        }
        if (today > endDate) {
            endDate = today;
        }
        var event$ = this.httpClient
            .get(this.baseUrl + 'v3/events/' + startDate.format(this.webServicesDateFormat) + '/' + endDate.format(this.webServicesDateFormat) + '/' + bookableItem.identifier, { headers: headers })
            .map(function (d) { return mapEvents(d, bookableItem, sagendaDateFormat, sagendaTimeFormat, cultureShortCode); })
            .catch(handleError);
        return event$;
    };
    APIv3Service.prototype.getBookableItems = function (bearerToken) {
        var headers = new __WEBPACK_IMPORTED_MODULE_3__angular_common_http__["c" /* HttpHeaders */]().set('Authorization', 'Bearer ' + bearerToken);
        var bi$ = this.httpClient
            .get(this.baseUrl + 'v3/bookableItems', { headers: headers })
            .map(mapBookableItems)
            .catch(handleError);
        return bi$;
    };
    APIv3Service.prototype.getToken = function () {
        return _window().sagendaToken;
    };
    APIv3Service = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["z" /* Injectable */])(),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_3__angular_common_http__["a" /* HttpClient */]])
    ], APIv3Service);
    return APIv3Service;
}());

function _window() {
    // return the native window obj
    return window;
}
function mapBookableItems(response) {
    return response.map(function (object) { return toBookableItems(object); });
}
function toBookableItems(item) {
    var bi = ({
        identifier: item.identifier,
        name: item.name,
        location: item.location,
        description: item.description
    });
    console.log('Parsed BookableItems:', bi.name);
    return bi;
}
function mapBearer(object) {
    return object.access_token;
}
function mapEvents(response, bookableItem, sagendaDateFormat, sagendaTimeFormat, cultureShortCode) {
    return response.map(function (e) { return toEvent(e, bookableItem, sagendaDateFormat, sagendaTimeFormat, cultureShortCode); });
}
// TODO : make this working for all case : events, all day, schedule...
function toEvent(event, bookableItem, sagendaDateFormat, sagendaTimeFormat, cultureShortCode) {
    __WEBPACK_IMPORTED_MODULE_2_moment__["locale"](cultureShortCode);
    var eventTitle;
    var eventStart;
    var eventEnd;
    // for all-day event
    if (event.date != null) {
        var eventDateInTextWithCulture = formatEvent(event.date, sagendaDateFormat, sagendaTimeFormat);
        eventTitle = eventDateInTextWithCulture + ' , all day'; // TODO : translate this
        eventStart = event.date;
        eventEnd = event.date;
    }
    if (event.from != null) {
        eventStart = event.from;
        eventEnd = event.to;
        var eventStartDateInTextWithCulture = formatEvent(event.from, sagendaDateFormat, sagendaTimeFormat);
        var eventEndDateInTextWithCulture = formatEvent(event.to, sagendaDateFormat, sagendaTimeFormat);
        eventTitle = eventStartDateInTextWithCulture + ' -> ' + eventEndDateInTextWithCulture;
    }
    if (event.payment != null) {
        eventTitle += ' : ' + event.payment.amount + ' ' + event.payment.currencyCode;
    }
    var s_event = ({
        start: new Date(eventStart),
        end: new Date(eventEnd),
        color: colors.green,
        title: eventTitle,
        meta: {
            eventIdentifier: event.identifier,
            bookableItemId: bookableItem.identifier,
            bookableItemName: bookableItem.name,
            bookableItemLocation: bookableItem.location,
            bookableItemDescription: bookableItem.description
        }
    });
    if (event.payment != null) {
        s_event.meta.paymentAmount = event.payment.amount;
        s_event.meta.paymentCurrencyCode = event.payment.currencyCode;
        s_event.meta.paymentNote = event.payment.note;
    }
    console.log('Parsed events:', s_event.start);
    return s_event;
}
function formatEvent(event, sagendaDateFormat, sagendaTimeFormat) {
    if (event.length < 9) {
        // small hack - add a date that will not be used cause momentjs require a full date.
        return __WEBPACK_IMPORTED_MODULE_2_moment__('June 29, 2017 ' + event).utc().format(sagendaTimeFormat);
    }
    if (event.length > 11) {
        return __WEBPACK_IMPORTED_MODULE_2_moment__(event).utc().format(sagendaDateFormat + ' ' + sagendaTimeFormat);
    }
    return __WEBPACK_IMPORTED_MODULE_2_moment__(event).utc().format(sagendaDateFormat);
}
// this could also be a private method of the component class
function handleError(error) {
    // log error
    // const errorMsg = error.message;
    console.error(error);
    // throw an application level error
    return __WEBPACK_IMPORTED_MODULE_1_rxjs_Observable__["a" /* Observable */].throw(error);
}


/***/ }),

/***/ "../../../../../src/app/services/progress-bar.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ProgressBarService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__ = __webpack_require__("../../../../rxjs/_esm5/BehaviorSubject.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};


var ProgressBarService = /** @class */ (function () {
    function ProgressBarService() {
        this.progressBarStatus = new __WEBPACK_IMPORTED_MODULE_1_rxjs_BehaviorSubject__["a" /* BehaviorSubject */](false);
    }
    ProgressBarService.prototype.displayProgressBar = function (value) {
        this.progressBarStatus.next(value);
    };
    ProgressBarService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["z" /* Injectable */])()
    ], ProgressBarService);
    return ProgressBarService;
}());



/***/ }),

/***/ "../../../../../src/app/services/singleton.service.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SingletonService; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_rxjs_BehaviorSubject__ = __webpack_require__("../../../../rxjs/_esm5/BehaviorSubject.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};


var SingletonService = /** @class */ (function () {
    function SingletonService() {
        this._viewDate = new __WEBPACK_IMPORTED_MODULE_0_rxjs_BehaviorSubject__["a" /* BehaviorSubject */](null);
        this.viewDate = this._viewDate.asObservable();
        this._bearerToken = new __WEBPACK_IMPORTED_MODULE_0_rxjs_BehaviorSubject__["a" /* BehaviorSubject */](null);
        this.bearerToken = this._bearerToken.asObservable();
        this._viewDate.next(new Date);
        this._bearerToken.next('');
    }
    SingletonService.prototype.setViewDate = function (object) {
        this._viewDate.next(object);
    };
    SingletonService.prototype.setBearerToken = function (object) {
        this._bearerToken.next(object);
    };
    SingletonService = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["z" /* Injectable */])(),
        __metadata("design:paramtypes", [])
    ], SingletonService);
    return SingletonService;
}());



/***/ }),

/***/ "../../../../../src/app/subscription/subscription.component.css":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("../../../../css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "input.ng-invalid.ng-touched {\n    border: 1px solid red;\n}", ""]);

// exports


/*** EXPORTS FROM exports-loader ***/
module.exports = module.exports.toString();

/***/ }),

/***/ "../../../../../src/app/subscription/subscription.component.html":
/***/ (function(module, exports) {

module.exports = "<div class=\"container\">\n    <div class=\"row\">\n        <div class=\"col-xs-12 text-left\">\n            <h2> subscription </h2>\n        </div>\n    </div>\n\n    <br/>\n    <div>\n        <div>\n            <h3>Your Selected Booking :</h3>\n        </div>\n        <div>\n            <strong>{{calendarEvent.meta.bookableItemName}}</strong>\n        </div>\n        <div>\n            <strong>From :</strong> {{startFormatted}}\n        </div>\n        <div>\n            <strong>To :</strong> {{endFormatted}}\n        </div>\n\n        <div *ngIf=\"calendarEvent.meta.paymentAmount != null\">\n            <div>\n                <strong>Amount :</strong> {{calendarEvent.meta.paymentAmount}} {{calendarEvent.meta.paymentCurrencyCode}}\n            </div>\n            <div style=\"font-style:italic\" *ngIf=\"calendarEvent.meta.paymentNote != null\">\n                <strong>Note :</strong> {{calendarEvent.meta.paymentNote}}\n            </div>\n        </div>\n\n        <br>\n        <div style=\"font-style:italic\">Let's Book It !</div>\n    </div>\n\n    <form (ngSubmit)=\"onSubmit(f)\" #f=\"ngForm\">\n\n        <div class=\"form-group\">\n            <label>{{sagendaTranslationSubscriptionTitle}} (*)</label>\n            <select name=\"courtesy\" id=\"courtesy\" class=\"form-control\" ngModel required #courtesy=\"ngModel\">\n                <option value=\"{{sagendaTranslationSubscriptionTitleMrs}}\">{{sagendaTranslationSubscriptionTitleMrs}}</option>\n                <option value=\"{{sagendaTranslationSubscriptionTitleMr}}\">{{sagendaTranslationSubscriptionTitleMr}}</option>\n                <option value=\"{{sagendaTranslationSubscriptionTitleMiss}}\">{{sagendaTranslationSubscriptionTitleMiss}}</option>\n                <option value=\"{{sagendaTranslationSubscriptionTitleDr}}\">{{sagendaTranslationSubscriptionTitleDr}}</option>\n            </select>\n        </div>\n\n        <div class=\"form-group\">\n            <label for=\"firstName\">{{sagendaTranslationSubscriptionFirstName}} (*)</label>\n            <input type=\"text\" class=\"form-control\" id=\"firstName\" name=\"firstName\" ngModel required #firstName=\"ngModel\">\n            <span class=\"help-block\" *ngIf=\"!firstName.valid && firstName.touched\">Value is required!</span>\n        </div>\n\n        <div class=\"form-group\">\n            <label for=\"lastName\">{{sagendaTranslationSubscriptionLastName}} (*)</label>\n            <input type=\"text\" class=\"form-control\" id=\"lastName\" name=\"lastName\" placeholder=\" lastName \" ngModel required #lastName=\"ngModel\">\n            <span class=\"help-block\" *ngIf=\"!lastName.valid && lastName.touched\">Value is required!</span>\n        </div>\n\n        <div class=\"form-group\">\n            <label for=\"email\">{{sagendaTranslationSubscriptionEmail}} (*)</label>\n            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"email\" ngModel required email #email=\"ngModel\">\n            <span class=\"help-block\" *ngIf=\"!email.valid && email.touched\">Please enter a valid email address!</span>\n        </div>\n\n        <div class=\"form-group\">\n            <label for=\"phone\">{{sagendaTranslationSubscriptionPhone}}</label>\n            <input type=\"phone\" class=\"form-control\" id=\"phone\" name=\"phone\" placeholder=\" phone \" ngModel>\n        </div>\n\n\n        <div class=\"form-group\">\n            <label for=\"description\">{{sagendaTranslationSubscriptionDescription}} </label>\n            <textarea class=\"form-control\" rows=\"3\" id=\"description\" name=\"description\" placeholder=\" description \" ngModel></textarea>\n        </div>\n\n        <div class=\"row\">\n            <div class=\"col text-left\">\n                <a href=\"?backUrlQuery\">\n                    <button type=\"button\" class=\"btn btn-warning btn-lg\"> back</button>\n                </a>\n            </div>\n            <div class=\"col text-right\">\n                <button [disabled]=\"!f.valid\" type=\"submit\" id=\"submit-subscription-button\" class=\"btn btn-success btn-lg\">Book\n                </button>\n            </div>\n        </div>\n    </form>\n</div>"

/***/ }),

/***/ "../../../../../src/app/subscription/subscription.component.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return SubscriptionComponent; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__ = __webpack_require__("../../../../../src/app/services/singleton.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__services_api3_service__ = __webpack_require__("../../../../../src/app/services/api3.service.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_moment__ = __webpack_require__("../../../../moment/moment.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3_moment___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3_moment__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__angular_platform_browser__ = __webpack_require__("../../../platform-browser/esm5/platform-browser.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};





var SubscriptionComponent = /** @class */ (function () {
    function SubscriptionComponent(apiv3Service, singletonService, document) {
        var _this = this;
        this.apiv3Service = apiv3Service;
        this.singletonService = singletonService;
        this.document = document;
        this.eventSelected = new __WEBPACK_IMPORTED_MODULE_1__angular_core__["v" /* EventEmitter */]();
        this.sagendaTranslationSubscriptionTitle = _window().sagendaTranslationSubscriptionTitle;
        this.sagendaTranslationSubscriptionTitleMrs = _window().sagendaTranslationSubscriptionTitleMrs;
        this.sagendaTranslationSubscriptionTitleMr = _window().sagendaTranslationSubscriptionTitleMr;
        this.sagendaTranslationSubscriptionTitleMiss = _window().sagendaTranslationSubscriptionTitleMiss;
        this.sagendaTranslationSubscriptionTitleDr = _window().sagendaTranslationSubscriptionTitleDr;
        this.sagendaTranslationSubscriptionFirstName = _window().sagendaTranslationSubscriptionFirstName;
        this.sagendaTranslationSubscriptionLastName = _window().sagendaTranslationSubscriptionLastName;
        this.sagendaTranslationSubscriptionEmail = _window().sagendaTranslationSubscriptionEmail;
        this.sagendaTranslationSubscriptionPhone = _window().sagendaTranslationSubscriptionPhone;
        this.sagendaTranslationSubscriptionDescription = _window().sagendaTranslationSubscriptionDescription;
        this.sagendaDateFormat = _window().sagendaDateFormat;
        this.sagendaTimeFormat = _window().sagendaTimeFormat;
        this.bearerToken = this.singletonService.bearerToken;
        this.singletonService.bearerToken.subscribe(function (bearerToken) { _this.bearerToken = bearerToken; });
    }
    SubscriptionComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.startFormatted = __WEBPACK_IMPORTED_MODULE_3_moment__(this.calendarEvent.start).utc().format(this.sagendaDateFormat + ' ' + this.sagendaTimeFormat);
        this.endFormatted = __WEBPACK_IMPORTED_MODULE_3_moment__(this.calendarEvent.end).utc().format(this.sagendaDateFormat + ' ' + this.sagendaTimeFormat);
        this.apiv3Service.getEventLock(this.bearerToken, this.calendarEvent.meta.eventIdentifier).subscribe(function (object) {
            _this.eventLock = object.identifier;
        });
    };
    SubscriptionComponent.prototype.onSubmit = function (form) {
        console.log('Submitted !' + form);
        this.calendarEvent.meta.courtesy = form.value.courtesy;
        this.calendarEvent.meta.firstName = form.value.firstName;
        this.calendarEvent.meta.lastName = form.value.lastName;
        this.calendarEvent.meta.phone = form.value.phone;
        this.calendarEvent.meta.email = form.value.email;
        this.calendarEvent.meta.description = form.value.description;
        this.setBooking();
    };
    /**
     * Set Booking
     */
    SubscriptionComponent.prototype.setBooking = function () {
        var _this = this;
        this.calendarEvent.meta.eventLock = this.eventLock;
        try {
            this.apiv3Service.setBooking(this.calendarEvent, this.bearerToken).subscribe(function (result) {
                if (result.paymentUrl !== null) {
                    _this.document.location.href = result.paymentUrl;
                }
                else {
                    // todo : use internal root?
                    _this.eventSelected.emit({ currentAction: 3, event: result.event });
                }
            });
        }
        catch (error) {
            // TODO : log error
            window.location.href = error.paymentURL;
        }
        finally {
        }
    };
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["C" /* Input */])(),
        __metadata("design:type", Object)
    ], SubscriptionComponent.prototype, "calendarEvent", void 0);
    __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["N" /* Output */])(),
        __metadata("design:type", Object)
    ], SubscriptionComponent.prototype, "eventSelected", void 0);
    SubscriptionComponent = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["m" /* Component */])({
            selector: 'app-subscription',
            template: __webpack_require__("../../../../../src/app/subscription/subscription.component.html"),
            styles: [__webpack_require__("../../../../../src/app/subscription/subscription.component.css")]
        }),
        __param(2, Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["y" /* Inject */])(__WEBPACK_IMPORTED_MODULE_4__angular_platform_browser__["b" /* DOCUMENT */])),
        __metadata("design:paramtypes", [__WEBPACK_IMPORTED_MODULE_2__services_api3_service__["a" /* APIv3Service */],
            __WEBPACK_IMPORTED_MODULE_0__services_singleton_service__["a" /* SingletonService */], Object])
    ], SubscriptionComponent);
    return SubscriptionComponent;
}());

/**
 * Return the window native object
 */
function _window() {
    return window;
}


/***/ }),

/***/ "../../../../../src/app/timeleft.pipe.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return TimeleftPipe; });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};

var TimeleftPipe = /** @class */ (function () {
    function TimeleftPipe() {
    }
    TimeleftPipe.prototype.transform = function (value) {
        var dateNow = new Date();
        var milliseconds = (Math.ceil(value.getTime()) - Math.ceil(dateNow.getTime() + dateNow.getTimezoneOffset() * 60 * 1000));
        return this.dhms(milliseconds);
    };
    TimeleftPipe.prototype.dhms = function (t) {
        var days, hours, minutes;
        days = Math.floor(t / 8.64e+7);
        t -= days * 8.64e+7;
        hours = Math.floor(t / 3.6e+6);
        t -= hours * 3.6e+6;
        minutes = Math.floor(t / 60000);
        return [
            days + 'day(s)',
            hours + 'hours',
            minutes + 'min'
        ].join(' ');
    };
    TimeleftPipe = __decorate([
        Object(__WEBPACK_IMPORTED_MODULE_0__angular_core__["R" /* Pipe */])({
            name: 'timeleft'
        })
    ], TimeleftPipe);
    return TimeleftPipe;
}());



/***/ }),

/***/ "../../../../../src/environments/environment.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return environment; });
// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `angular-cli.json`.
var environment = {
    production: false
};


/***/ }),

/***/ "../../../../../src/main.ts":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__ = __webpack_require__("../../../platform-browser-dynamic/esm5/platform-browser-dynamic.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__angular_core__ = __webpack_require__("../../../core/esm5/core.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__environments_environment__ = __webpack_require__("../../../../../src/environments/environment.ts");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__app_app_module__ = __webpack_require__("../../../../../src/app/app.module.ts");




if (__WEBPACK_IMPORTED_MODULE_2__environments_environment__["a" /* environment */].production) {
    Object(__WEBPACK_IMPORTED_MODULE_1__angular_core__["_11" /* enableProdMode */])();
}
Object(__WEBPACK_IMPORTED_MODULE_0__angular_platform_browser_dynamic__["a" /* platformBrowserDynamic */])().bootstrapModule(__WEBPACK_IMPORTED_MODULE_3__app_app_module__["a" /* AppModule */]);


/***/ }),

/***/ "../../../../moment/locale recursive ^\\.\\/.*$":
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./af": "../../../../moment/locale/af.js",
	"./af.js": "../../../../moment/locale/af.js",
	"./ar": "../../../../moment/locale/ar.js",
	"./ar-dz": "../../../../moment/locale/ar-dz.js",
	"./ar-dz.js": "../../../../moment/locale/ar-dz.js",
	"./ar-kw": "../../../../moment/locale/ar-kw.js",
	"./ar-kw.js": "../../../../moment/locale/ar-kw.js",
	"./ar-ly": "../../../../moment/locale/ar-ly.js",
	"./ar-ly.js": "../../../../moment/locale/ar-ly.js",
	"./ar-ma": "../../../../moment/locale/ar-ma.js",
	"./ar-ma.js": "../../../../moment/locale/ar-ma.js",
	"./ar-sa": "../../../../moment/locale/ar-sa.js",
	"./ar-sa.js": "../../../../moment/locale/ar-sa.js",
	"./ar-tn": "../../../../moment/locale/ar-tn.js",
	"./ar-tn.js": "../../../../moment/locale/ar-tn.js",
	"./ar.js": "../../../../moment/locale/ar.js",
	"./az": "../../../../moment/locale/az.js",
	"./az.js": "../../../../moment/locale/az.js",
	"./be": "../../../../moment/locale/be.js",
	"./be.js": "../../../../moment/locale/be.js",
	"./bg": "../../../../moment/locale/bg.js",
	"./bg.js": "../../../../moment/locale/bg.js",
	"./bm": "../../../../moment/locale/bm.js",
	"./bm.js": "../../../../moment/locale/bm.js",
	"./bn": "../../../../moment/locale/bn.js",
	"./bn.js": "../../../../moment/locale/bn.js",
	"./bo": "../../../../moment/locale/bo.js",
	"./bo.js": "../../../../moment/locale/bo.js",
	"./br": "../../../../moment/locale/br.js",
	"./br.js": "../../../../moment/locale/br.js",
	"./bs": "../../../../moment/locale/bs.js",
	"./bs.js": "../../../../moment/locale/bs.js",
	"./ca": "../../../../moment/locale/ca.js",
	"./ca.js": "../../../../moment/locale/ca.js",
	"./cs": "../../../../moment/locale/cs.js",
	"./cs.js": "../../../../moment/locale/cs.js",
	"./cv": "../../../../moment/locale/cv.js",
	"./cv.js": "../../../../moment/locale/cv.js",
	"./cy": "../../../../moment/locale/cy.js",
	"./cy.js": "../../../../moment/locale/cy.js",
	"./da": "../../../../moment/locale/da.js",
	"./da.js": "../../../../moment/locale/da.js",
	"./de": "../../../../moment/locale/de.js",
	"./de-at": "../../../../moment/locale/de-at.js",
	"./de-at.js": "../../../../moment/locale/de-at.js",
	"./de-ch": "../../../../moment/locale/de-ch.js",
	"./de-ch.js": "../../../../moment/locale/de-ch.js",
	"./de.js": "../../../../moment/locale/de.js",
	"./dv": "../../../../moment/locale/dv.js",
	"./dv.js": "../../../../moment/locale/dv.js",
	"./el": "../../../../moment/locale/el.js",
	"./el.js": "../../../../moment/locale/el.js",
	"./en-au": "../../../../moment/locale/en-au.js",
	"./en-au.js": "../../../../moment/locale/en-au.js",
	"./en-ca": "../../../../moment/locale/en-ca.js",
	"./en-ca.js": "../../../../moment/locale/en-ca.js",
	"./en-gb": "../../../../moment/locale/en-gb.js",
	"./en-gb.js": "../../../../moment/locale/en-gb.js",
	"./en-ie": "../../../../moment/locale/en-ie.js",
	"./en-ie.js": "../../../../moment/locale/en-ie.js",
	"./en-nz": "../../../../moment/locale/en-nz.js",
	"./en-nz.js": "../../../../moment/locale/en-nz.js",
	"./eo": "../../../../moment/locale/eo.js",
	"./eo.js": "../../../../moment/locale/eo.js",
	"./es": "../../../../moment/locale/es.js",
	"./es-do": "../../../../moment/locale/es-do.js",
	"./es-do.js": "../../../../moment/locale/es-do.js",
	"./es-us": "../../../../moment/locale/es-us.js",
	"./es-us.js": "../../../../moment/locale/es-us.js",
	"./es.js": "../../../../moment/locale/es.js",
	"./et": "../../../../moment/locale/et.js",
	"./et.js": "../../../../moment/locale/et.js",
	"./eu": "../../../../moment/locale/eu.js",
	"./eu.js": "../../../../moment/locale/eu.js",
	"./fa": "../../../../moment/locale/fa.js",
	"./fa.js": "../../../../moment/locale/fa.js",
	"./fi": "../../../../moment/locale/fi.js",
	"./fi.js": "../../../../moment/locale/fi.js",
	"./fo": "../../../../moment/locale/fo.js",
	"./fo.js": "../../../../moment/locale/fo.js",
	"./fr": "../../../../moment/locale/fr.js",
	"./fr-ca": "../../../../moment/locale/fr-ca.js",
	"./fr-ca.js": "../../../../moment/locale/fr-ca.js",
	"./fr-ch": "../../../../moment/locale/fr-ch.js",
	"./fr-ch.js": "../../../../moment/locale/fr-ch.js",
	"./fr.js": "../../../../moment/locale/fr.js",
	"./fy": "../../../../moment/locale/fy.js",
	"./fy.js": "../../../../moment/locale/fy.js",
	"./gd": "../../../../moment/locale/gd.js",
	"./gd.js": "../../../../moment/locale/gd.js",
	"./gl": "../../../../moment/locale/gl.js",
	"./gl.js": "../../../../moment/locale/gl.js",
	"./gom-latn": "../../../../moment/locale/gom-latn.js",
	"./gom-latn.js": "../../../../moment/locale/gom-latn.js",
	"./gu": "../../../../moment/locale/gu.js",
	"./gu.js": "../../../../moment/locale/gu.js",
	"./he": "../../../../moment/locale/he.js",
	"./he.js": "../../../../moment/locale/he.js",
	"./hi": "../../../../moment/locale/hi.js",
	"./hi.js": "../../../../moment/locale/hi.js",
	"./hr": "../../../../moment/locale/hr.js",
	"./hr.js": "../../../../moment/locale/hr.js",
	"./hu": "../../../../moment/locale/hu.js",
	"./hu.js": "../../../../moment/locale/hu.js",
	"./hy-am": "../../../../moment/locale/hy-am.js",
	"./hy-am.js": "../../../../moment/locale/hy-am.js",
	"./id": "../../../../moment/locale/id.js",
	"./id.js": "../../../../moment/locale/id.js",
	"./is": "../../../../moment/locale/is.js",
	"./is.js": "../../../../moment/locale/is.js",
	"./it": "../../../../moment/locale/it.js",
	"./it.js": "../../../../moment/locale/it.js",
	"./ja": "../../../../moment/locale/ja.js",
	"./ja.js": "../../../../moment/locale/ja.js",
	"./jv": "../../../../moment/locale/jv.js",
	"./jv.js": "../../../../moment/locale/jv.js",
	"./ka": "../../../../moment/locale/ka.js",
	"./ka.js": "../../../../moment/locale/ka.js",
	"./kk": "../../../../moment/locale/kk.js",
	"./kk.js": "../../../../moment/locale/kk.js",
	"./km": "../../../../moment/locale/km.js",
	"./km.js": "../../../../moment/locale/km.js",
	"./kn": "../../../../moment/locale/kn.js",
	"./kn.js": "../../../../moment/locale/kn.js",
	"./ko": "../../../../moment/locale/ko.js",
	"./ko.js": "../../../../moment/locale/ko.js",
	"./ky": "../../../../moment/locale/ky.js",
	"./ky.js": "../../../../moment/locale/ky.js",
	"./lb": "../../../../moment/locale/lb.js",
	"./lb.js": "../../../../moment/locale/lb.js",
	"./lo": "../../../../moment/locale/lo.js",
	"./lo.js": "../../../../moment/locale/lo.js",
	"./lt": "../../../../moment/locale/lt.js",
	"./lt.js": "../../../../moment/locale/lt.js",
	"./lv": "../../../../moment/locale/lv.js",
	"./lv.js": "../../../../moment/locale/lv.js",
	"./me": "../../../../moment/locale/me.js",
	"./me.js": "../../../../moment/locale/me.js",
	"./mi": "../../../../moment/locale/mi.js",
	"./mi.js": "../../../../moment/locale/mi.js",
	"./mk": "../../../../moment/locale/mk.js",
	"./mk.js": "../../../../moment/locale/mk.js",
	"./ml": "../../../../moment/locale/ml.js",
	"./ml.js": "../../../../moment/locale/ml.js",
	"./mr": "../../../../moment/locale/mr.js",
	"./mr.js": "../../../../moment/locale/mr.js",
	"./ms": "../../../../moment/locale/ms.js",
	"./ms-my": "../../../../moment/locale/ms-my.js",
	"./ms-my.js": "../../../../moment/locale/ms-my.js",
	"./ms.js": "../../../../moment/locale/ms.js",
	"./mt": "../../../../moment/locale/mt.js",
	"./mt.js": "../../../../moment/locale/mt.js",
	"./my": "../../../../moment/locale/my.js",
	"./my.js": "../../../../moment/locale/my.js",
	"./nb": "../../../../moment/locale/nb.js",
	"./nb.js": "../../../../moment/locale/nb.js",
	"./ne": "../../../../moment/locale/ne.js",
	"./ne.js": "../../../../moment/locale/ne.js",
	"./nl": "../../../../moment/locale/nl.js",
	"./nl-be": "../../../../moment/locale/nl-be.js",
	"./nl-be.js": "../../../../moment/locale/nl-be.js",
	"./nl.js": "../../../../moment/locale/nl.js",
	"./nn": "../../../../moment/locale/nn.js",
	"./nn.js": "../../../../moment/locale/nn.js",
	"./pa-in": "../../../../moment/locale/pa-in.js",
	"./pa-in.js": "../../../../moment/locale/pa-in.js",
	"./pl": "../../../../moment/locale/pl.js",
	"./pl.js": "../../../../moment/locale/pl.js",
	"./pt": "../../../../moment/locale/pt.js",
	"./pt-br": "../../../../moment/locale/pt-br.js",
	"./pt-br.js": "../../../../moment/locale/pt-br.js",
	"./pt.js": "../../../../moment/locale/pt.js",
	"./ro": "../../../../moment/locale/ro.js",
	"./ro.js": "../../../../moment/locale/ro.js",
	"./ru": "../../../../moment/locale/ru.js",
	"./ru.js": "../../../../moment/locale/ru.js",
	"./sd": "../../../../moment/locale/sd.js",
	"./sd.js": "../../../../moment/locale/sd.js",
	"./se": "../../../../moment/locale/se.js",
	"./se.js": "../../../../moment/locale/se.js",
	"./si": "../../../../moment/locale/si.js",
	"./si.js": "../../../../moment/locale/si.js",
	"./sk": "../../../../moment/locale/sk.js",
	"./sk.js": "../../../../moment/locale/sk.js",
	"./sl": "../../../../moment/locale/sl.js",
	"./sl.js": "../../../../moment/locale/sl.js",
	"./sq": "../../../../moment/locale/sq.js",
	"./sq.js": "../../../../moment/locale/sq.js",
	"./sr": "../../../../moment/locale/sr.js",
	"./sr-cyrl": "../../../../moment/locale/sr-cyrl.js",
	"./sr-cyrl.js": "../../../../moment/locale/sr-cyrl.js",
	"./sr.js": "../../../../moment/locale/sr.js",
	"./ss": "../../../../moment/locale/ss.js",
	"./ss.js": "../../../../moment/locale/ss.js",
	"./sv": "../../../../moment/locale/sv.js",
	"./sv.js": "../../../../moment/locale/sv.js",
	"./sw": "../../../../moment/locale/sw.js",
	"./sw.js": "../../../../moment/locale/sw.js",
	"./ta": "../../../../moment/locale/ta.js",
	"./ta.js": "../../../../moment/locale/ta.js",
	"./te": "../../../../moment/locale/te.js",
	"./te.js": "../../../../moment/locale/te.js",
	"./tet": "../../../../moment/locale/tet.js",
	"./tet.js": "../../../../moment/locale/tet.js",
	"./th": "../../../../moment/locale/th.js",
	"./th.js": "../../../../moment/locale/th.js",
	"./tl-ph": "../../../../moment/locale/tl-ph.js",
	"./tl-ph.js": "../../../../moment/locale/tl-ph.js",
	"./tlh": "../../../../moment/locale/tlh.js",
	"./tlh.js": "../../../../moment/locale/tlh.js",
	"./tr": "../../../../moment/locale/tr.js",
	"./tr.js": "../../../../moment/locale/tr.js",
	"./tzl": "../../../../moment/locale/tzl.js",
	"./tzl.js": "../../../../moment/locale/tzl.js",
	"./tzm": "../../../../moment/locale/tzm.js",
	"./tzm-latn": "../../../../moment/locale/tzm-latn.js",
	"./tzm-latn.js": "../../../../moment/locale/tzm-latn.js",
	"./tzm.js": "../../../../moment/locale/tzm.js",
	"./uk": "../../../../moment/locale/uk.js",
	"./uk.js": "../../../../moment/locale/uk.js",
	"./ur": "../../../../moment/locale/ur.js",
	"./ur.js": "../../../../moment/locale/ur.js",
	"./uz": "../../../../moment/locale/uz.js",
	"./uz-latn": "../../../../moment/locale/uz-latn.js",
	"./uz-latn.js": "../../../../moment/locale/uz-latn.js",
	"./uz.js": "../../../../moment/locale/uz.js",
	"./vi": "../../../../moment/locale/vi.js",
	"./vi.js": "../../../../moment/locale/vi.js",
	"./x-pseudo": "../../../../moment/locale/x-pseudo.js",
	"./x-pseudo.js": "../../../../moment/locale/x-pseudo.js",
	"./yo": "../../../../moment/locale/yo.js",
	"./yo.js": "../../../../moment/locale/yo.js",
	"./zh-cn": "../../../../moment/locale/zh-cn.js",
	"./zh-cn.js": "../../../../moment/locale/zh-cn.js",
	"./zh-hk": "../../../../moment/locale/zh-hk.js",
	"./zh-hk.js": "../../../../moment/locale/zh-hk.js",
	"./zh-tw": "../../../../moment/locale/zh-tw.js",
	"./zh-tw.js": "../../../../moment/locale/zh-tw.js"
};
function webpackContext(req) {
	return __webpack_require__(webpackContextResolve(req));
};
function webpackContextResolve(req) {
	var id = map[req];
	if(!(id + 1)) // check for number or string
		throw new Error("Cannot find module '" + req + "'.");
	return id;
};
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "../../../../moment/locale recursive ^\\.\\/.*$";

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("../../../../../src/main.ts");


/***/ })

},[0]);
//# sourceMappingURL=main.bundle.js.map