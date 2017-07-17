# TestSoapHook
This is an example plugin for the `SoapHook` plugin slot. The plugin registers a new SOAP method `getObjectTitleByRefId` to the ILIAS SOAP server.

Note: The new SOAP method `getObjectTitleByRefId` is only available under the ILIAS client where this plugin is installed. The SOAP endpoint MUST include the client-ID as GET parameter, otherwise the method is not found. The SOAP endpoint thus becomes: http://your-ilias-domain.com/webservice/soap/server.php?client_id=<client_id>

## Installation
```
mkdir -p Customizing/global/plugins/Services/WebServices/SoapHook
cd Customizing/global/plugins/Services/WebServices/SoapHook
git clone https://github.com/ILIAS-eLearning/TestSoapHook.git
```

Activate the plugin in ILIAS under `Adiminstration > Plugins`.

## Usage

The new method `getObjectTitleByRefId` requires two parameters:
* `sid`: A valid sesison-ID obtained via the `login` method
* `ref_id`: Ref-ID of any object to lookup the title

**Example request body:**

```xml
<x:Envelope xmlns:x="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn1="urn:sample">
    <x:Header/>
    <x:Body>
        <urn1:getObjectTitleByRefId>
            <urn1:sid>9uhu6jkq0id1jm5jpl6j24lon2::default</urn1:sid>
            <urn1:ref_id>1</urn1:ref_id>
        </urn1:getObjectTitleByRefId>
    </x:Body>
</x:Envelope>
```
