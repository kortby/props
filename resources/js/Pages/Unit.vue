<template>
    <PropLayout :propertyname="unit.property_name">
        <div class="bg-white max-w-6xl mx-auto p-8">
            <div class="pt-6 pb-16 sm:pb-24">
                <div
                    class="mt-8 max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8"
                >
                    <div class="grid-cols-12">
                        <h1
                            class="text-3xl font-bold pb-1"
                            v-html="unit.property_name"
                        ></h1>
                        <h2
                            class="text-ml pb-4 text-gray-400"
                            v-html="unit.property_address"
                        ></h2>
                    </div>
                    <div
                        class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8"
                    >
                        <div class="lg:col-start-8 lg:col-span-5">
                            <div class="flex justify-between">
                                <h1 class="text-xl font-medium text-gray-900">
                                    {{ unit.name }}
                                </h1>
                                <p class="text-xl font-medium text-gray-900">
                                    {{ unit.price }}
                                </p>
                            </div>
                            <!-- Reviews -->
                            <div class="mt-4">
                                <h2 class="sr-only">Reviews</h2>
                                <div class="flex items-center">
                                    <p class="text-sm text-gray-700">
                                        {{ unit.rating }}
                                        <span class="sr-only">
                                            out of 5 stars</span
                                        >
                                    </p>
                                    <div class="ml-1 flex items-center">
                                        <StarIcon
                                            v-for="rating in [0, 1, 2, 3, 4]"
                                            :key="rating"
                                            :class="[
                                                unit.rating > rating
                                                    ? 'text-yellow-400'
                                                    : 'text-gray-200',
                                                'h-5 w-5 flex-shrink-0',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <div
                                        aria-hidden="true"
                                        class="ml-4 text-sm text-gray-300"
                                    >
                                        ·
                                    </div>
                                    <div class="ml-4 flex">
                                        {{ unit.reviewCount }} reviews
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image gallery -->
                        <div
                            class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3"
                        >
                            <h2 class="sr-only">Images</h2>

                            <div
                                class="grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-3 lg:gap-8"
                            >
                                <img
                                    v-for="image in unit.pictures"
                                    :key="image.id"
                                    :src="image.imageSrc"
                                    :alt="image.imageAlt"
                                    :class="[
                                        image.primary
                                            ? 'lg:col-span-2 lg:row-span-2'
                                            : 'hidden lg:block',
                                        'rounded-lg',
                                    ]"
                                />
                            </div>
                        </div>

                        <div class="mt-8 lg:col-span-5">
                            <a
                                type="submit"
                                class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                :href="`tel:+1${unit.property_phone}`"
                                v-html="unit.property_phone"
                            ></a>

                            <!-- unit details -->
                            <div class="mt-10">
                                <h2 class="text-sm font-medium text-gray-900">
                                    Description
                                </h2>

                                <div
                                    class="mt-4 prose prose-sm text-gray-500"
                                    v-html="unit.description"
                                />
                            </div>

                            <div class="mt-8 border-t border-gray-200 pt-8">
                                <h2 class="text-sm font-medium text-gray-900">
                                    Fabric &amp; Care
                                </h2>

                                <div class="mt-4 prose prose-sm text-gray-500">
                                    <ul role="list">
                                        <li
                                            v-for="item in unit.details"
                                            :key="item"
                                        >
                                            {{ item }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-8 grid gap-x-8 gap-y-4 grid-cols-3">
                                <div class="">
                                    <svg
                                        xmlns:dc="http://purl.org/dc/elements/1.1/"
                                        xmlns:cc="http://creativecommons.org/ns#"
                                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                        xmlns:svg="http://www.w3.org/2000/svg"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                        viewBox="0 0 177.27083 39.158333"
                                        version="1.1"
                                        id="svg8"
                                        inkscape:version="0.92.5 (2060ec1f9f, 2020-04-08)"
                                        sodipodi:docname="zillow logo.svg"
                                    >
                                        <defs id="defs2">
                                            <linearGradient
                                                gradientUnits="userSpaceOnUse"
                                                y2="5.112"
                                                x2="4.7909899"
                                                y1="43.007"
                                                x1="40.129002"
                                                id="paint0_linear"
                                            >
                                                <stop
                                                    id="stop821"
                                                    stop-color="#515254"
                                                />
                                                <stop
                                                    id="stop823"
                                                    stop-color="#48494B"
                                                    offset="0.192"
                                                />
                                                <stop
                                                    id="stop825"
                                                    stop-color="#313233"
                                                    offset="0.503"
                                                />
                                                <stop
                                                    id="stop827"
                                                    stop-color="#0C0C0C"
                                                    offset="0.893"
                                                />
                                                <stop id="stop829" offset="1" />
                                            </linearGradient>
                                            <linearGradient
                                                id="linear-gradient"
                                                x1="0.036169"
                                                y1="36.132832"
                                                x2="36.132832"
                                                y2="0.036169"
                                                gradientUnits="userSpaceOnUse"
                                            >
                                                <stop
                                                    id="stop874"
                                                    offset="0"
                                                    stop-color="#0074f5"
                                                />
                                                <stop
                                                    id="stop876"
                                                    offset="1"
                                                    stop-color="#03aaff"
                                                />
                                            </linearGradient>
                                        </defs>
                                        <sodipodi:namedview
                                            id="base"
                                            pagecolor="#ffffff"
                                            bordercolor="#666666"
                                            borderopacity="1.0"
                                            inkscape:pageopacity="0.0"
                                            inkscape:pageshadow="2"
                                            inkscape:zoom="0.84107037"
                                            inkscape:cx="355.69556"
                                            inkscape:cy="-94.325771"
                                            inkscape:document-units="mm"
                                            inkscape:current-layer="layer1"
                                            showgrid="false"
                                            fit-margin-top="0"
                                            fit-margin-left="0"
                                            fit-margin-right="0"
                                            fit-margin-bottom="0"
                                            inkscape:window-width="1920"
                                            inkscape:window-height="1017"
                                            inkscape:window-x="1912"
                                            inkscape:window-y="70"
                                            inkscape:window-maximized="1"
                                            inkscape:pagecheckerboard="true"
                                        />
                                        <metadata id="metadata5">
                                            <rdf:RDF>
                                                <cc:Work rdf:about="">
                                                    <dc:format
                                                        >image/svg+xml</dc:format
                                                    >
                                                    <dc:type
                                                        rdf:resource="http://purl.org/dc/dcmitype/StillImage"
                                                    />
                                                    <dc:title></dc:title>
                                                </cc:Work>
                                            </rdf:RDF>
                                        </metadata>
                                        <g
                                            inkscape:label="Layer 1"
                                            inkscape:groupmode="layer"
                                            id="layer1"
                                            transform="translate(50.010288,-30.400465)"
                                        >
                                            <g
                                                style="fill: none"
                                                id="g951"
                                                transform="matrix(1.6315769,0,0,1.6315972,-50.553603,30.400465)"
                                            >
                                                <path
                                                    id="path940"
                                                    d="m 14.098,6.364 c 0.103,-0.027 0.15,0.012 0.211,0.084 0.35,0.416 1.478,1.866 1.785,2.263 a 0.132,0.132 0 0 1 -0.027,0.19 c -2.274,1.873 -4.804,4.522 -6.214,6.42 -0.03,0.04 -0.005,0.043 0.015,0.034 2.456,-1.116 8.224,-2.897 10.826,-3.396 V 8.485 L 10.524,0 0.333,8.485 v 3.797 C 3.492,10.301 10.79,7.234 14.097,6.364 Z m 47.28,-5.183 h 4.475 v 22.332 h -4.475 z m -3.315,0 h -4.475 v 22.333 h 4.475 z m 29.713,7.72 h -4.421 l 4.477,14.615 h 4.117 l 1.124,-3.695 c 0.446,-1.468 1.19,-4.209 1.19,-4.209 a 0.034,0.034 0 0 1 0.033,-0.026 c 0.015,0 0.028,0.01 0.033,0.026 0,0 0.745,2.794 1.168,4.234 l 1.103,3.667 h 4.044 L 105.089,8.9 h -4.109 l -1.282,4.421 a 278.446,278.446 0 0 0 -1.141,4.213 0.034,0.034 0 0 1 -0.033,0.026 0.034,0.034 0 0 1 -0.033,-0.026 c 0,0 -0.69,-2.698 -1.137,-4.213 l -1.32,-4.42 h -3.266 l -1.344,4.42 c -0.421,1.414 -1.16,4.215 -1.16,4.215 a 0.034,0.034 0 0 1 -0.033,0.023 0.034,0.034 0 0 1 -0.032,-0.023 c 0,0 -0.714,-2.75 -1.142,-4.215 z m -19.708,7.356 c 0,-4.44 3.393,-7.729 7.544,-7.729 4.11,0 7.504,3.29 7.504,7.729 0,4.453 -3.392,7.743 -7.504,7.743 -4.15,0 -7.544,-3.29 -7.544,-7.74 z m 10.754,0 c 0,-2.174 -1.47,-3.654 -3.21,-3.654 -1.781,0 -3.25,1.48 -3.25,3.654 0,2.189 1.469,3.654 3.25,3.654 1.74,0 3.21,-1.465 3.21,-3.654 z M 27.702,3.247 v 4.306 h 7.909 c 0.032,0 0.044,0.032 0.028,0.06 l -7.94,14.242 -0.014,0.026 c -0.18,0.348 -0.223,0.432 -0.223,0.793 v 0.84 H 42.868 V 19.216 H 34.31 a 0.035,0.035 0 0 1 -0.032,-0.021 0.039,0.039 0 0 1 0.004,-0.04 L 42.314,4.726 42.336,4.68 c 0.056,-0.12 0.11,-0.232 0.11,-0.532 l 0.002,-0.9 H 27.702 Z M 47.955,1.581 c 1.395,0 2.548,1.188 2.548,2.651 0,1.464 -1.153,2.654 -2.548,2.654 -1.395,0 -2.547,-1.188 -2.547,-2.652 0,-1.464 1.152,-2.652 2.547,-2.652 z m -2.237,7.32 h 4.474 V 23.514 H 45.718 Z M 5.604,20.922 c 0.055,0.068 0.15,0.082 0.22,0.034 3.778,-2.054 12.089,-4.661 14.87,-5.16 v 7.806 H 0.334 v -8.11 c 2.093,-1.25 7.747,-3.814 9.737,-4.5 0.04,-0.014 0.049,0.01 0.015,0.037 -1.91,1.497 -4.904,5.03 -6.371,7.301 -0.067,0.106 -0.063,0.14 -0.01,0.205 z M 107.409,6.104 c 0.387,0 0.663,0.294 0.663,0.714 0,0.318 -0.163,0.569 -0.411,0.668 l 0.381,0.66 h -0.362 l -0.354,-0.614 h -0.312 v 0.612 h -0.318 v -2.04 z m -0.395,1.128 h 0.375 c 0.211,0 0.366,-0.172 0.366,-0.411 0,-0.24 -0.155,-0.415 -0.365,-0.415 h -0.376 z m 0.299,-1.836 c -0.676,0 -1.285,0.43 -1.543,1.088 a 1.833,1.833 0 0 0 0.362,1.921 1.606,1.606 0 0 0 1.82,0.382 c 0.624,-0.273 1.031,-0.916 1.031,-1.629 -0.001,-0.973 -0.748,-1.761 -1.67,-1.762 z m 0,3.186 c -0.546,0 -1.038,-0.347 -1.247,-0.879 a 1.482,1.482 0 0 1 0.292,-1.552 c 0.386,-0.408 0.967,-0.53 1.471,-0.309 0.504,0.22 0.833,0.74 0.833,1.316 -0.001,0.786 -0.604,1.423 -1.349,1.424 z"
                                                    inkscape:connector-curvature="0"
                                                    style="
                                                        clip-rule: evenodd;
                                                        fill: #006aff;
                                                        fill-rule: evenodd;
                                                    "
                                                />
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="356.027 243.8 114.545 21"
                                    >
                                        <path
                                            fill="#EC1C24"
                                            d="M364.178 254.521c-.734 0-1.102-.587-1.322-1.102-.22-.515-.146-.954-.66-.954s-1.762 1.541-1.982 3.598c0 .221-.074 1.615-.074 2.35v2.203c0 .807-.072 1.835.074 2.422.146.809.367.882.954 1.176.22.073.294.146.44.146v.074h-5.58v-.074c.146 0 .221-.073.44-.146.661-.294.808-.367.954-1.176.147-.587.074-1.615.074-2.422v-5.214-2.423c-.074-.588-.221-.734-.514-.955-.295-.22-.588-.22-.809-.293v-.074h3.745c.147 0 .147.074.147.147v3.378c.366-1.469 1.101-2.424 1.541-2.864.441-.44 1.176-.954 2.13-.954.44 0 .954.146 1.321.514.221.221.441.66.441 1.248.074.733-.365 1.395-1.32 1.395zM376 257.017h-7.857c0 3.524.44 5.287 1.322 6.315.66.807 1.321.954 2.202.954 2.423 0 3.671-1.982 4.186-4.038H376c-.515 2.569-2.203 4.332-4.773 4.332-1.469 0-3.084-.367-4.186-1.543-1.175-1.321-1.615-2.863-1.615-4.992 0-4.039 2.276-6.682 5.507-6.682 3.671 0 5.287 2.496 5.287 4.846-.148.221-.148.514-.22.808zm-3.525-4.919c-.514-.515-.954-.661-1.688-.661-.661 0-1.102.146-1.542.661-.661.734-1.027 2.35-1.102 4.699h4.332c.881 0 .955 0 .955-1.322-.075-1.762-.514-2.938-.955-3.377zm12.482 12.482c-.734 0-1.321 0-1.615-.221-.367-.221-.66-.808-.588-1.909-.293 1.028-1.32 2.13-3.23 2.13-1.762 0-3.304-1.028-3.304-3.158 0-.807.22-1.468.734-1.908.954-.881 2.202-.955 3.45-1.469 1.689-.661 2.497-1.469 2.497-2.35v-2.276c0-1.615-.44-1.909-1.688-1.909-.661 0-1.028.146-1.322.44-.293.294-.44.954-.44 1.836 0 .954-.514 1.321-1.321 1.321-.661 0-1.175-.367-1.175-1.102 0-.514.146-.881.514-1.248.661-.808 2.497-1.321 3.745-1.321 2.203 0 4.332.808 4.332 2.937 0 .955-.074 5.728-.074 7.49 0 1.321 0 1.762.295 2.056a.928.928 0 0 0 .66.294c.294 0 .514-.074.808-.221v.074c-.369.22-1.323.514-2.278.514zm-4.111-6.535c-.809.44-1.176.734-1.469 1.175-.294.514-.514 1.321-.514 2.13 0 1.688.66 2.643 1.836 2.643.22 0 .514 0 .733-.146.661-.294 1.249-1.322 1.249-2.276v-4.993c-.367.659-1.028 1.026-1.835 1.467zm6.02 6.241c.147-.073.367-.147.515-.22.514-.221.734-.367.881-1.176.146-.587.146-1.541.146-2.423V247.47c0-.514 0-1.908-.073-2.422-.073-.588-.22-.809-.515-.955-.293-.221-.587-.221-.807-.294h3.744c.146 0 .146 0 .146.221v16.595c0 .807 0 1.762.074 2.422.146.809.367.955 1.027 1.176.147.073.221.073.367.146v.074h-5.507v-.147h.002z"
                                        />
                                        <path
                                            fill="#231F20"
                                            d="M400.45 262.67c-.44.955-1.763 1.91-3.084 1.91-1.175 0-1.909-.147-2.569-.809-.514-.514-.809-1.102-.809-2.202 0-.587.074-8.37.147-9.839-.44 0-1.321 0-1.763-.074v-.073c1.836-.44 3.011-1.396 4.26-5.434h.072v5.36h2.938v.146h-2.938l-.146 10.721c0 1.102.294 1.762 1.542 1.762 1.028 0 1.836-.807 2.203-1.541l.147.073zm5.067 1.91c-2.937 0-6.095-2.57-6.095-6.609 0-4.037 3.158-6.607 6.095-6.607 2.938 0 6.168 2.496 6.168 6.607 0 4.039-3.158 6.609-6.168 6.609zm1.983-12.263c-.588-.734-1.322-.881-1.983-.881s-1.396.22-1.909.808c-.881.955-1.395 3.377-1.395 5.654 0 2.35.514 4.625 1.395 5.653.588.734 1.322.882 1.982.882.661 0 1.322-.147 1.982-.882.809-.954 1.396-3.304 1.396-5.653-.073-2.277-.587-4.552-1.468-5.581zm11.82 2.204c-.733 0-1.101-.587-1.32-1.102-.221-.515-.147-.954-.662-.954-.514 0-1.762 1.541-1.982 3.598 0 .221-.072 1.615-.072 2.35v2.203c0 .807-.074 1.835.072 2.422.147.809.367.882.955 1.176.221.073.293.146.44.146v.074h-5.507v-.074c.146 0 .221-.073.44-.146.661-.294.808-.367.954-1.176.147-.587.074-1.615.074-2.422v-5.214-2.423c-.074-.588-.221-.734-.514-.955-.295-.22-.588-.22-.809-.293v-.074h3.745c.147 0 .147.074.147.147v3.378c.366-1.469 1.101-2.424 1.541-2.864.441-.44 1.176-.954 2.13-.954.44 0 .954.146 1.321.514.221.221.441.66.441 1.248.003.733-.439 1.395-1.394 1.395zm1.397 10.279c-.882 0-1.616-.661-1.616-1.615s.734-1.615 1.616-1.615c.881 0 1.614.587 1.614 1.615-.073.954-.733 1.615-1.614 1.615zm8.443-.22c-1.615 0-3.084-.661-4.038-1.615-1.249-1.249-1.689-3.012-1.689-5.141 0-4.038 3.084-6.461 5.801-6.461 1.836 0 3.23.66 3.745 1.321.44.515.66.954.66 1.396 0 .954-.66 1.321-1.248 1.321-1.027 0-1.395-.661-1.469-1.615-.22-1.688-.514-2.276-1.762-2.276-.514 0-1.321.221-1.763.734-.66.808-1.027 2.717-1.027 5.066 0 2.938.367 4.846 1.102 5.947.587.809 1.321 1.028 1.982 1.028 2.717 0 3.892-2.35 4.332-4.112h.146c-.734 2.497-2.276 4.407-4.772 4.407zm10.721 0c-2.938 0-6.095-2.57-6.095-6.609 0-4.037 3.157-6.607 6.095-6.607 2.937 0 6.167 2.496 6.167 6.607 0 4.039-3.231 6.609-6.167 6.609zm1.982-12.263c-.588-.734-1.322-.881-1.982-.881-.661 0-1.396.22-1.909.808-.882.955-1.396 3.377-1.396 5.654 0 2.35.514 4.625 1.396 5.653.587.734 1.321.882 1.982.882.66 0 1.321-.147 1.982-.882.808-.954 1.395-3.304 1.395-5.653-.146-2.277-.66-4.552-1.468-5.581zm18.87 11.969c.147-.073.221-.147.44-.22.588-.221.808-.367.955-1.176.146-.587.146-1.541.146-2.423v-5.214c0-1.395-.146-2.055-.44-2.496-.367-.514-.881-.808-1.615-.808-1.322 0-2.864 1.175-3.084 3.451 0 .44-.073.954-.073 1.542v3.451c0 .808-.074 1.762.073 2.423.146.808.367.954.954 1.175.221.074.294.146.441.146v.074h-5.581v-.074c.147 0 .221-.072.44-.146.588-.221.808-.367.955-1.175.146-.587.146-1.542.146-2.423v-5.213c0-1.396-.146-2.057-.514-2.497-.367-.514-.881-.808-1.615-.808-1.469 0-2.864 1.248-3.084 3.524-.074.734-.074 1.615-.074 2.497v2.422c0 .809-.073 1.836.074 2.424.146.808.367.881 1.027 1.175l.44.147v.072h-5.58v-.072c.146 0 .221-.074.44-.147.661-.22.808-.367.955-1.175.146-.588.146-1.615.146-2.424v-5.139c0-.515 0-1.982-.073-2.424-.073-.587-.221-.734-.514-.954-.294-.221-.588-.221-.809-.294v-.073h3.745c.146 0 .146 0 .146.146l-.073 2.938c.367-1.321 1.028-2.056 1.689-2.57.514-.367 1.468-.808 2.496-.808 1.321 0 2.276.367 2.79 1.027.294.367.808 1.176.808 2.424.367-1.395 1.102-2.203 1.763-2.644.66-.514 1.688-.808 2.423-.808 1.615 0 2.423.514 2.863 1.102.367.44.734 1.248.734 2.79v5.286c0 .809 0 1.763.147 2.424.146.808.367.955.954 1.175l.44.147v.072h-5.507v.151h.006zM468.37 254.006c-.294 0-.588-.072-.881-.146-.294-.146-.515-.293-.661-.44-.221-.22-.367-.44-.44-.661-.147-.293-.147-.514-.147-.881 0-.294.074-.588.147-.881.146-.294.293-.514.44-.734.22-.221.44-.367.734-.441.293-.146.587-.146.881-.146s.588.074.881.146c.294.147.515.295.661.441.221.221.367.44.44.66.146.295.146.515.146.882 0 .294-.073.587-.146.881-.146.294-.294.515-.44.734s-.44.367-.734.44c-.294.146-.587.146-.881.146zm0-.22c.294 0 .514-.073.808-.147.22-.072.44-.22.587-.439.147-.147.294-.367.441-.588.073-.221.146-.514.146-.734 0-.294-.073-.514-.146-.734a1.15 1.15 0 0 0-.441-.588c-.146-.146-.367-.293-.587-.439-.221-.074-.514-.147-.734-.147-.294 0-.514.073-.808.147a1.14 1.14 0 0 0-.588.439c-.146.147-.293.367-.44.588-.073.221-.146.514-.146.734 0 .293.073.514.146.734s.221.44.44.588c.147.146.367.293.588.439.219.074.513.147.734.147zm-.881-3.231h1.027c.294 0 .588.074.734.221s.221.294.221.514c0 .221-.074.367-.147.441-.073.146-.22.22-.367.293l.588.809h-.588l-.514-.734h-.367v.734h-.514v-2.277h-.073zm1.028 1.101c.147 0 .221 0 .294-.073s.073-.146.073-.22c0-.146 0-.221-.073-.221-.073-.073-.146-.073-.294-.073h-.514v.661h.514v-.074z"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <!-- Policies -->
                            <section
                                aria-labelledby="policies-heading"
                                class="mt-10"
                            >
                                <h2 id="policies-heading" class="sr-only">
                                    Our Policies
                                </h2>

                                <dl
                                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2"
                                >
                                    <div
                                        v-for="policy in policies"
                                        :key="policy.name"
                                        class="bg-gray-50 border border-gray-200 rounded-lg p-6 text-center"
                                    >
                                        <dt>
                                            <component
                                                :is="policy.icon"
                                                class="mx-auto h-6 w-6 flex-shrink-0 text-gray-400"
                                                aria-hidden="true"
                                            />
                                            <span
                                                class="mt-4 text-sm font-medium text-gray-900"
                                            >
                                                {{ policy.name }}
                                            </span>
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-500">
                                            {{ policy.description }}
                                        </dd>
                                    </div>
                                </dl>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PropLayout>
</template>

<script setup>
import { computed, ref } from "vue";
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import { CurrencyDollarIcon, GlobeIcon } from "@heroicons/vue/outline";

import PropLayout from "@/Pages/Shared/Partials/PropLayout.vue";

let props = defineProps({
    unit_heading: String,
    number_of_bedroom: Number,
    number_of_bathroom: Number,
    number_of_balcony: Number,
    date_available_from: String,
    description: String,
    unit_number: Number,
    size: Number,
    price: Number,
    property_name: String,
    property_address_1: String,
    property_address_2: String,
    property_city: String,
    property_state: String,
    property_postal_code: Number,
    property_phone: Number,
    pictures: Array,
});

const unit = {
    name: props.unit_heading,
    price: "$" + new Intl.NumberFormat().format(props.price),
    rating: Math.floor(Math.random() * 5),
    reviewCount: Math.floor(Math.random() * 500),
    href: "#",
    pictures: [
        {
            id: 0,
            imageSrc: props.pictures[0],
            imageAlt: "Apartment Architecture",
            primary: true,
        },
        {
            id: 1,
            imageSrc: props.pictures[1],
            imageAlt: "Kitchen.",
            primary: false,
        },
        {
            id: 2,
            imageSrc: props.pictures[2],
            imageAlt: "View from the top.",
            primary: false,
        },
    ],
    description: props.description,
    details: [
        "Unit Number: " + props.unit_number,
        "Size: " + props.size + " sqft",
        props.number_of_bedroom +
            " Bedrooms " +
            props.number_of_bathroom +
            " Bathrooms ",
        "Available from: " +
            new Date(props.date_available_from).toString().slice(0, 15),
        "Has " + props.number_of_balcony + " Balcony.",
    ],
    property_name: props.property_name,
    property_address:
        props.property_address_1 +
        " " +
        props.property_address_2 +
        " , " +
        props.property_city +
        " , " +
        props.property_state +
        " " +
        props.property_postal_code,
    property_phone: props.property_phone,
};
const policies = [
    {
        name: "International delivery",
        icon: GlobeIcon,
        description: "Get your order in 2 years",
    },
    {
        name: "Loyalty rewards",
        icon: CurrencyDollarIcon,
        description: "Don't look at other tees",
    },
];
</script>
