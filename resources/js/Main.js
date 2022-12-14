import Vendor from './vendor/Vendor.js';

import General from './views/General.js';
import Components from './components/Components.js';

import Home from './views/Home.js';
import EditProfile from './views/EditProfile.js';

export default class Main { 

  static main = function() {

    Vendor();

    General()

    Components();

    Home();
    EditProfile();
  }

}

