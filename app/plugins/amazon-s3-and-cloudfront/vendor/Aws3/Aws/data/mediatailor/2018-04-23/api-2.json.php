<?php

// This file was auto-generated from sdk-root/src/data/mediatailor/2018-04-23/api-2.json
return ['metadata' => ['apiVersion' => '2018-04-23', 'endpointPrefix' => 'api.mediatailor', 'signingName' => 'mediatailor', 'serviceFullName' => 'AWS MediaTailor', 'serviceId' => 'MediaTailor', 'protocol' => 'rest-json', 'jsonVersion' => '1.1', 'uid' => 'mediatailor-2018-04-23', 'signatureVersion' => 'v4', 'serviceAbbreviation' => 'MediaTailor'], 'operations' => ['DeletePlaybackConfiguration' => ['name' => 'DeletePlaybackConfiguration', 'http' => ['method' => 'DELETE', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 204], 'input' => ['shape' => 'DeletePlaybackConfigurationRequest'], 'errors' => []], 'GetPlaybackConfiguration' => ['name' => 'GetPlaybackConfiguration', 'http' => ['method' => 'GET', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 200], 'input' => ['shape' => 'GetPlaybackConfigurationRequest'], 'output' => ['shape' => 'GetPlaybackConfigurationResponse'], 'errors' => []], 'ListPlaybackConfigurations' => ['name' => 'ListPlaybackConfigurations', 'http' => ['method' => 'GET', 'requestUri' => '/playbackConfigurations', 'responseCode' => 200], 'input' => ['shape' => 'ListPlaybackConfigurationsRequest'], 'output' => ['shape' => 'ListPlaybackConfigurationsResponse'], 'errors' => []], 'PutPlaybackConfiguration' => ['name' => 'PutPlaybackConfiguration', 'http' => ['method' => 'PUT', 'requestUri' => '/playbackConfiguration', 'responseCode' => 200], 'input' => ['shape' => 'PutPlaybackConfigurationRequest'], 'output' => ['shape' => 'PutPlaybackConfigurationResponse'], 'errors' => []]], 'shapes' => ['CdnConfiguration' => ['type' => 'structure', 'members' => ['AdSegmentUrlPrefix' => ['shape' => '__string'], 'ContentSegmentUrlPrefix' => ['shape' => '__string']]], 'HlsConfiguration' => ['type' => 'structure', 'members' => ['ManifestEndpointPrefix' => ['shape' => '__string']]], 'DashConfiguration' => ['type' => 'structure', 'members' => ['ManifestEndpointPrefix' => ['shape' => '__string'], 'MpdLocation' => ['shape' => '__string']]], 'DashConfigurationForPut' => ['type' => 'structure', 'members' => ['MpdLocation' => ['shape' => '__string']]], 'DeletePlaybackConfigurationRequest' => ['type' => 'structure', 'members' => ['Name' => ['shape' => '__string', 'location' => 'uri', 'locationName' => 'Name']], 'required' => ['Name']], 'GetPlaybackConfigurationRequest' => ['type' => 'structure', 'members' => ['Name' => ['shape' => '__string', 'location' => 'uri', 'locationName' => 'Name']], 'required' => ['Name']], 'GetPlaybackConfigurationResponse' => ['type' => 'structure', 'members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'DashConfiguration' => ['shape' => 'DashConfiguration'], 'HlsConfiguration' => ['shape' => 'HlsConfiguration'], 'Name' => ['shape' => '__string'], 'PlaybackEndpointPrefix' => ['shape' => '__string'], 'SessionInitializationEndpointPrefix' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']]], 'PlaybackConfiguration' => ['type' => 'structure', 'members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'Name' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']]], 'ListPlaybackConfigurationsRequest' => ['type' => 'structure', 'members' => ['MaxResults' => ['shape' => '__integerMin1Max100', 'location' => 'querystring', 'locationName' => 'MaxResults'], 'NextToken' => ['shape' => '__string', 'location' => 'querystring', 'locationName' => 'NextToken']]], 'ListPlaybackConfigurationsResponse' => ['type' => 'structure', 'members' => ['Items' => ['shape' => '__listOfPlaybackConfigurations'], 'NextToken' => ['shape' => '__string']]], 'PutPlaybackConfigurationRequest' => ['type' => 'structure', 'members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'DashConfiguration' => ['shape' => 'DashConfigurationForPut'], 'Name' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']]], 'PutPlaybackConfigurationResponse' => ['type' => 'structure', 'members' => ['AdDecisionServerUrl' => ['shape' => '__string'], 'CdnConfiguration' => ['shape' => 'CdnConfiguration'], 'DashConfiguration' => ['shape' => 'DashConfiguration'], 'HlsConfiguration' => ['shape' => 'HlsConfiguration'], 'Name' => ['shape' => '__string'], 'PlaybackEndpointPrefix' => ['shape' => '__string'], 'SessionInitializationEndpointPrefix' => ['shape' => '__string'], 'SlateAdUrl' => ['shape' => '__string'], 'TranscodeProfileName' => ['shape' => '__string'], 'VideoContentSourceUrl' => ['shape' => '__string']]], '__boolean' => ['type' => 'boolean'], '__double' => ['type' => 'double'], '__integer' => ['type' => 'integer'], '__listOfPlaybackConfigurations' => ['type' => 'list', 'member' => ['shape' => 'PlaybackConfiguration']], '__long' => ['type' => 'long'], '__string' => ['type' => 'string'], '__integerMin1Max100' => ['type' => 'integer', 'min' => 1, 'max' => 100], '__timestampIso8601' => ['type' => 'timestamp', 'timestampFormat' => 'iso8601'], '__timestampUnix' => ['type' => 'timestamp', 'timestampFormat' => 'unixTimestamp']]];
