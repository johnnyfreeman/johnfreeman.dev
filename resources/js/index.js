import { Application } from "stimulus"
import { definitionsFromContext } from "stimulus/webpack-helpers"
import * as Turbo from "@hotwired/turbo"

Turbo.setProgressBarDelay(250)

const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))

